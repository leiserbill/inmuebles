<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoMensaje extends Notification
{
    use Queueable;
    public $id_inmueble;
    public $titulo_inmueble;
    public $usuario_id;
    public $mensaje;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_inmueble, $titulo_inmueble, $usuario_id, $mensaje)
    {
        $this->id_inmueble = $id_inmueble;
        $this->titulo_inmueble = $titulo_inmueble;
        $this->usuario_id = $usuario_id->id;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones/' . $this->id_inmueble);
        return (new MailMessage)
                    ->line('Has recibido un nuevo mensaje.')
                    ->line('El inmueble es:' . $this->titulo_inmueble)
                    ->line($this->mensaje)
                    ->action('Ver Notificaciones', $url)
                    ->line('Gracias por usar la aplicación!');
    }

   public function toDatabase($notifiable)
   {
    return[
        'id_inmueble' => $this->id_inmueble,
        'titulo_inmueble' => $this->titulo_inmueble,
        'usuario_id' => $this->usuario_id,

    ];

   }
}
