<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

use App\Message;


class NewMessage extends Notification
{
    use Queueable;
    private  $messagenew;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($messagenew)
    {


        $this->messagenew =$messagenew;

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


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        return [
            'id'=>  $this->messagenew->id,
            'title'=>'New Message :',
            'user'=> Auth::user()->name,
            'message'=>  $this->messagenew->message,


        ];
    }
}
