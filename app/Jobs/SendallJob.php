<?php

namespace App\Jobs;

use App\Mail\AllNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendallJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $company; 
    protected $detail; 
    protected $name; 
    
    public function __construct($company,$detail,$name)
    {
        $this->company=$company;
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
        $email= new AllNotification($this->detail,$this->name);
        Mail::to($this->company)->send($email); 
    }
}
