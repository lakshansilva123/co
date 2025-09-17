<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;
use Illuminate\Notifications\Messages\VonageMessage;

class BookingConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Booking $booking)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail', 'vonage'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your booking has been confirmed.')
                    ->action('View Booking', url('/bookings/' . $this->booking->id))
                    ->line('Thank you for your business!');
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     */
    public function toVonage($notifiable)
    {
        return (new VonageMessage)
            ->content('Your booking has been confirmed. View details: ' . url('/bookings/' . $this->booking->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
