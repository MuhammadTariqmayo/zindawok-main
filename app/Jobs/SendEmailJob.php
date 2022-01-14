<?php

namespace App\Jobs;

use App\Mail\UserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user; 
    protected $detail; 
    protected $name; 

    public function __construct($user,$detail,$name)
    {
        $this->user=$user;
        $this->detail=$detail;
        $this->name=$name;
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email= new UserNotification($this->detail,$this->name);
        Mail::to($this->user)->send($email);        

    }
}
