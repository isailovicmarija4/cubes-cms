<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
	
	protected $contactName;
	protected $contactEmail;
	protected $contactQuestion;
	
	
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactName, $contactEmail, $contactQuestion) {
		$this->contactName = $contactName;
		$this->contactEmail = $contactEmail;
		$this->contactQuestion = $contactQuestion;
	}

	    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contactEmail, $this->contactName)
				->view('emails.contact-form', [
					'contactName' => $this->contactName,
					'contactQuestion' => $this->contactQuestion
				]);
    }
}
