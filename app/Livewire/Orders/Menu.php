<?php

namespace App\Livewire\Orders;

use App\Helpers\ImageMerger;
use App\Mail\NewOrderReceivedMail;
use App\Mail\OrderPlacedMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
    public array $selectedProducts = [];

    public function mount($selectedProducts): void
    {
        $this->selectedProducts = collect($selectedProducts)->pluck('product_id')->toArray();
    }

    #[On('update-selected-products-list')]
    public function updateSelectedProducts($selectedProducts): void
    {
        $this->selectedProducts = collect($selectedProducts)->pluck('product_id')->toArray();
    }

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        return view('livewire.orders.menu', [
            'selected_products' => $this->selectedProducts
        ]);
    }

    public function order(): void
    {
        if (count($this->selectedProducts) == 0) {
            session()->flash('error', 'First select at least one product.');
        } else {
            /** @var User $user */
            $user = auth()->user();
            $orderItems = [];
            $images = [];
            $total = 0;
            $products = Product::with('image')->whereIn('id', $this->selectedProducts)->get();
            foreach ($products as $product) {
                $orderItems[] = [
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                ];
                $total += $product->price;
                $images[] = $product->image;
            }
            /** @var Order $order */
            $order = $user->orders()->create([
                'status' => 'pending',
                'total_amount' => $total,
            ]);
            $order->items()->createMany($orderItems);

            $this->sendMails($products, $user, $images);

            $this->selectedProducts = [];
            $this->dispatch('update-selected-products-list',
                selectedProducts : $this->selectedProducts);

            $this->redirectRoute('order-placed');
        }
    }

    public function sendMails($products, $user, $images): void
    {
        $setting = Setting::first();
        $recipients = User::role('manager')->get();
        foreach ($recipients as $recipient) {
            Mail::to($recipient->email)->send(new NewOrderReceivedMail($products, $setting, $user));
        }
//            Mail::to('jumamuratovahurliman8@gmail.com')->send(new OrderPlacedMail($products, Setting::first(), $images));
        Mail::to($user->email)->send(new OrderPlacedMail($products, $setting, $images));

    }
}
