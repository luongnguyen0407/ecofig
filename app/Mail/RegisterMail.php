<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fullName;
    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName, $content)
    {
        //
        $this->fullName = $fullName;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kích hoạt tài khoản')->view('page.email.template', [
            'fullName' => $this->fullName,
            'content' => $this->content
        ]);
    }
}
