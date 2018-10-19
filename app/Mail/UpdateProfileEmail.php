<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProfileEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token, $email)
    {
        $this->name = $name;
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cangkrukan.klas@gmail.com')
            ->view('view.name')
            ->with([
                'name'=>$this->name,
                'token'=>$this->token,
                'email'=>$this->email
                ]);
    }
}
