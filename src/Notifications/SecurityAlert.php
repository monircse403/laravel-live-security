<?php

namespace monircse403\LiveSecurity\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SecurityAlert extends Notification
{
    use Queueable;

    protected $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [config('livesecurity.alert_channels.mail') ? 'mail' : 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->message)
            ->action('View App', url('/'));
    }

    public function toArray($notifiable)
    {
        return ['message' => $this->message];
    }
}
