<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\DatabaseNotification;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ValidationErrorNotification extends Notification
{
    use Queueable;
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'data' => 'Update available',
        ];
    }

    public function toDatabase(object $notifiable): DatabaseNotification
    {
        return FilamentNotification::make()
            ->danger()
            ->title('Error While Updating')
            ->body($this->message)
            ->actions([
                Action::make('markAsRead')
                    ->label('Mark as Read')
                    ->button()
                    ->markAsRead(),
            ])
            ->toDatabase();
    }
}
