<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms(){

       try{

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+9779706007151', 
                ['from' => $twilio_number, 'body' => ""] );
       }catch(\Exception $e){
        dd($e->getMessage());
       }
    }
}
