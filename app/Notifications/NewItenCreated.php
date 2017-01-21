<?php

namespace borg\Notifications;

use borg\Itens;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewItenCreated extends Notification
{
    use Queueable;

    public $itens;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Itens $itens)
    {
        $this->itens = $itens;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $url = url('dashboard/admin/itens/' . $this->itens->id);
        return [
            'message' => 'Novo item criado ',
            'item_name' => $this->itens->title,
            'item_id' => $this->itens->id,
            'url' => $url,
        ];
    }
}
