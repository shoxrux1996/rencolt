<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class OrderNotification extends Notification
{
    use Queueable;
    private $request;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($request = null)
    {
        $this->request = $request;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toTelegram($message)
    {
        return TelegramMessage::create()
            ->to(45177248)
            ->content("*Заказ*\n *Имя:* ".$message->name.
                "\n *Телефон:* ".$message->phone.
                "\n *Текст:* ".$message->text.($this->request != null ?  "\n *Продукт:* ".$this->request->name_ru : ''));
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
