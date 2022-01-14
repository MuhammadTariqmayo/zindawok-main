<?php

namespace App\Jobs;

use App\Mail\MyDemoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContectEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $detail;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($detail)
    {
        $this->detail=$detail;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email= new MyDemoMail($this->detail);
        Mail::to('office@idenbrid.com')->send($email);
    }
}
