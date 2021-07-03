<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class NewItemNotification extends Notification
{
    use Queueable;
    private $itemData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($itemData)
    {
        $this->itemData = $itemData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
{
    return (new MailMessage)
                ->name($this->itemData['name'])
                ->id($this->itemData['item_id'])
                ->line($this->itemData['body'])
                ->action($this->itemData['text'], $this->itemData['url'])
                ->line($this->itemData['thanks']);
}

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'item_id' => $this->itemData['item_id']
        ];
    }

    public function toDatabase($notifiable)
    {
        info("This is the current notification ID, it's generated right here before inserting to database");
        info($this->id);
        return [

            'item_id' => $this->itemData['item_id'],
            'message' => 'Notification message',

        ];
    }
}
