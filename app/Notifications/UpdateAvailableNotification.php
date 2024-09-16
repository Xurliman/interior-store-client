<?php

namespace App\Notifications;

use Filament\Notifications\DatabaseNotification;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Filament\Notifications\Actions\Action;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateAvailableNotification extends Notification
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
            'data' => 'Update available',
        ];
    }

    public function toDatabase(object $notifiable): DatabaseNotification
    {
        return FilamentNotification::make()
            ->success()
            ->title('New Content')
            ->body('Update available')
            ->actions([
                Action::make('installUpdate')
                    ->label('Install Update')
                    ->button()
                    ->url(route('install.update', ['id' => $this->id])),
            ])
            ->toDatabase();
    }
}
