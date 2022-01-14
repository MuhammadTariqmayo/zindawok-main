<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AllNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public $name;

    public function __construct($data , $name)
    {
        $this->data = $data;
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
                    ->subject($this->data->title)
                    ->view('mails.all_mail')
                    ->attach(public_path("/storage/admin_all_email/{$this->data->logo}"), [
                        'as' => $this->data->logo,
                        'mime' => "image/{$this->data->ext}"
                    ]);
    }
}
