<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\contactUsMail;
use Mail;

class ContactUsController extends Controller
{
    //

    public function sendMail(Request $request){
        $senderEmail=$request->email;
        $senderName=$request->name;
        $senderPN=$request->phone;
        $senderMess=$request->msg;

        $content=array(
            'SN'=>$senderName,
            'SPN'=>$senderPN,
            'SMSG'=>$senderMess
        );
        

        mail::to($senderEmail)->send( new contactUsMail($content));
        return $content;
    }
}
