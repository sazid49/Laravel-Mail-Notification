<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
     public $name = '';
     public $messsage='';
  
    public function __construct($name,$messsage)
    {
        $this->name=$name;
        $this->messsage=$messsage;

    }

  
    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!')
        //              ->line('Web Jouyrney');

        $name=$this->name;
        $messsage=$this->messsage;

         return (new MailMessage)->view('notification',compact('name','messsage'));

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
            //
        ];
    }
}
