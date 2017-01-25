<?php

namespace borg\Notifications;

use borg\Orders;
use borg\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrderCreated extends Notification
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
                    ->subject('Recebemos seu pedido de Cotação')
                    ->greeting("Olá {$this->user->name},")
                    ->line('Acabamos de receber seu pedido de orçamento em nosso sistema!')
                    ->line('Os fornecedores que você solicitou também receberam os dados deste pedido. A partir 
                    de agora você deve aguardar o contato deles para que possa concluir sua negociação.')
                    ->line('Os detalhes de sua compra já se encontram disponíveis no seu painel BORG.');
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
