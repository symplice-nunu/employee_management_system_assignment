<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Mailpit\Mailpit;

class ResetPassword extends Notification
{
    public function via($notifiable)
    {
        return [Mailpit::class];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Password Reset Confirmation')
            ->line('Your password has been reset successfully.')
            ->line('If you did not request a password reset, please contact support.');
    }
}
