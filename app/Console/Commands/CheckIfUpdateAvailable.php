<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\UpdateAvailableNotification;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class CheckIfUpdateAvailable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-if-update-available';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if update available';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            $storeId = env('license.store_id');
            $response = Http::post('check-if-update-available', [
                'store_id' => $storeId,
            ]);

            if ($response->successful() and $response->json('is_available')) {
                $users = User::role('manager')->get();
                Notification::send($users, new UpdateAvailableNotification());
            }
        } catch (ConnectionException $exception) {

        }
    }
}
