<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plainPassword;

    /**
     * Create a new message instance.
     *
     * @param \App\User $user
     * @param string $plainPassword
     */
    public function __construct(User $user, $plainPassword)
    {
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('manel.horchani123@gmail.com', 'manel Horchani')
        ->view('mail.hello')
        ->with([
            'user' => $this->user,
            'plainPassword' => $this->plainPassword,
        ])
        ->subject('Welcome to Our Application');

    }
}
