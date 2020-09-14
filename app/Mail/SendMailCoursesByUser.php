<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCoursesByUser extends Mailable
{
    use Queueable, SerializesModels;
	protected $data;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data = []) {
		//
		$this->data = $data;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('frontend.emails.SendMailCoursesByUser')
        ->subject(trans('front.SendMailCoursesByUser'))
        ->with('data', $this->data);
    }
}
