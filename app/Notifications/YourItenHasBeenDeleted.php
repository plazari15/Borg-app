<?php

namespace borg\Notifications;

use borg\Itens;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class YourItenHasBeenDeleted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Itens $itens)
    {
        $this->item = $itens;
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
        if(!empty($this->item->title)) {
            $title = $this->item->title;
        }else{
            $title = $this->item->product->title;
        }
        return (new MailMessage)
                    ->subject('O item "' . $title . '" fere nossas políticas')
                    ->line('Um item que você cadastrou em nosso sistema fere nossas políticas.')
                    ->line('Por este motivo, o item foi removido de nossa base de dados.')
                    ->line('Você pode tentar cadastrar seu item novamente.')
                    ->line('Obrigado por utilizar o BORG!');
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
