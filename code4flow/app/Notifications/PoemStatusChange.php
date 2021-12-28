<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PoemStatusChange extends Notification
{
    use Queueable;

    protected $poem;

    public $casts = [ 'poem' => 'array' ];

    public function __construct($poem)
    {
        $this->poem = $poem;
        $this->afterCommit();
    }

    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Megváltozott vers státusz")
                    ->line('Megváltozott a várakozó versed státusza!')
                    ->line('Jelentkezz be újra, és nézd meg mi újság a Költők Klubbjában!');
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->poem->id,
            'status' => $this->poem->status,
            'title' => $this->poem->title,
        ];
    }
}
