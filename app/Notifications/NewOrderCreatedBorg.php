<?php

namespace borg\Notifications;

use borg\Orders;
use borg\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrderCreatedBorg extends Notification
{
    use Queueable;
    public $user;
    public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Orders $orders)
    {
        $this->user = $user;
        $this->order = $orders;
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
                    ->greeting('Olá Administrador, ')
                    ->line('Um novo pedido foi registrado em nosso sistema pelo {NOME DO CLIENTE}')
                    ->line('Sua solicitação inclui mais de {51} Itens. Você pode verificar este pedido e imprimir o arquivo Excel 
                    em seu painel administrativo');
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
