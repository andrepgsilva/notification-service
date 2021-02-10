<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class OrderShipped extends Notification
{
    // use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @param App\Models\Order $order
     * 
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
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
            ->subject('Order ' .  $this->order->id . ' shipped')
            ->markdown(
                'emails.orders.shipped',
                ['order' => $this->order]
            );
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Message\SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)->from('andrepgsilva', ':ghost:')
                ->to('#laravel')
                ->content('Order ' .  $this->order->id . ' shipped');
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
