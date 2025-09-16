<?php

namespace App\Mail;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $room;
    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct(Room $room, Booking $booking)
    {
        $this->room = $room;
        $this->booking = $booking;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Booking: ' . $this->room->name)
                    ->view('emails.booking');
    }
}
