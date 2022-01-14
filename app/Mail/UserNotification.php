<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
    public $user;
    public $name;

    public function __construct($user , $name)
    {
        $this->user = $user;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('muh.t.995@gmail.com', 'ZindaWork')
                    ->subject($this->user->title)
                    ->view('mails.admin_user_mail')
                    ->attach(public_path("/storage/admin_user_email/{$this->user->logo}"), [
                        'as' => $this->user->logo,
                        'mime' => "image/{$this->user->ext}"
                    ]);
    }
}
