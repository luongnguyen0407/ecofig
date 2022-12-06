<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RegisterMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $fullname;
    private $content;
    private $mail_to;
    public function __construct($fullname, $content, $mail_to)
    {
        //
        $this->fullname =   $fullname;
        $this->content   =  $content;
        $this->mail_to  =   $mail_to;
    }

    /**
     * Execute the job. 
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->mail_to)->send(new RegisterMail($this->fullname, $this->content));
    }
}
