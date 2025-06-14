<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(config('app.url') . route('password.reset', $this->token, false));

        return (new MailMessage)
            ->subject('Zavia Estates - Password Reset Request') // Custom subject
            ->greeting('Hello!')
            ->line('We received a password reset request for your Zavia Estates account.')
            ->action('Reset Password', $resetUrl)
            ->line('This password reset link will expire in 60 minutes.')
            ->line('If you didn’t request this, please ignore this email.')
            ->salutation('Regards, Zavia Estates');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
