<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateInstalledNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function toDatabase(): \Filament\Notifications\DatabaseNotification
    {
        return \Filament\Notifications\Notification::make()
            ->success()
            ->title('Content Installed')
            ->body('Update installed successfully')
            ->actions([
                Action::make('markAsRead')
                    ->label('Mark as Read')
                    ->button()
                    ->markAsRead(),
            ])
            ->toDatabase();
    }
}
