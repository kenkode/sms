<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VacationStatus extends Mailable
{
    use Queueable, SerializesModels;

    protected $vacation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vacation)
    {
        //
        $this->vacation = $vacation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('wangoken2@gmail.com')
                ->view('emails.vacation_status')
                ->with([
                        'vacation' => $this->vacation,
                    ]);;
    }
}
