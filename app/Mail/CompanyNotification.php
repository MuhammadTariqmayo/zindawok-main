<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $company;
    public $name;

    public function __construct($company , $name)
    {
        $this->company = $company;
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
                    ->subject($this->company->title)
                    ->view('mails.admin_company_mail')
                    ->attach(public_path("/storage/admin_company_email/{$this->company->logo}"), [
                        'as' => $this->company->logo,
                        'mime' => "image/{$this->company->ext}"
                    ]);
    }
}
