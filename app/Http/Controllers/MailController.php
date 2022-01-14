<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Virat Gandhi");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('umar.farooq78686@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('umer.idenbrid@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Zindawork");
      Mail::send('mail', $data, function($message) {
         $message->to('umar.farooq78686@gmail.com', 'Tutorials Point')->subject
            ('Two Factor Authentication Code ');
         $message->from('umer.idenbrid@gmail.com','Zindawork');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('umar.farooq78686@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');

         $message->from('umer.idenbrid@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
