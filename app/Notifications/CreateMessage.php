<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateMessage extends Notification
{
    use Queueable;
    private $message_id;
    private $full_custom_id;
    private $user_create;
    private $body;
    private $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message_id, $full_custom_id, $user_create, $body, $user_id)
    {
        $this->message_id = $message_id;
        $this->full_custom_id = $full_custom_id;
        $this->user_create = $user_create;
        $this->body = $body;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message_id' => $this->message_id,
            'full_custom_id' => $this->full_custom_id,
            'user_create' => $this->user_create,
            'body' => $this->body,
            'user_id' => $this->user_id
        ];
    }
}
