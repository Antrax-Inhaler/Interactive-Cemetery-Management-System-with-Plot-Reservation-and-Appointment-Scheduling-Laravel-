<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    
    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token; // Assign the token
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password Notification - Green Park Memorial Garden Website')
            ->greeting('Hello,')
            ->line('You are receiving this email because we received a password reset request for your account on the Green Park Memorial Garden Website.')
            ->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('If you did not request a password reset, please ignore this email. Your account will remain secure.')
            ->line('Thank you for being part of the Green Park Memorial Garden community.')
            ->salutation('Warm regards,')
            ->salutation('Green Park Memorial Garden Website Team');
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
