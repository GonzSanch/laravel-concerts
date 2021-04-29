<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProfitNotification extends Notification
{
    use Queueable;

    protected $concierto;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($concierto)
    {
        $this->concierto = $concierto;
        $this->promotor = $concierto->promotor;
        $this->recinto = $concierto->recinto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject("Informe de beneficios para nuevo concierto")
                    ->greeting('Hola, '.$this->promotor->nombre)
                    ->line("Los beneficios para el nuevo concierto '".$this->concierto->nombre
                        ."' que se celebrá en '".$this->recinto->nombre."' son de: ".$this->concierto->rentabilidad."€.")
                    ->salutation("Recibe un cordial un saludo");
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
