<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyTo extends Notification
{
    use Queueable;

    public $futsal;
    public $from;
    public $to;
    public $date;

    /**
     * Create a new notification instance.
     */
    public function __construct($futsal, $from, $to, $date)
    {
        $this->futsal = $futsal;
        $this->from = $from;
        $this->to = $to;
        $this->date = $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => auth()->user()->id,
            'futsal_id' => $this->futsal->id,
            'from'     => $this->from,
            'date'     => $this->date,
            'to'  => $this->to,
        ];
    }
}
