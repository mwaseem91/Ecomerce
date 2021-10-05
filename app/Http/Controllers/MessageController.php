<?php

namespace App\Http\Controllers;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessgeController extends Controller
{
    function store(Request $request)
    {
        $message = new message();
        $message->name =  $request->name;
        $message->email =  $request->email;
        $message->subject =  $request->subject;
        $message->message =  $request->message;
        $message->save();

        $email = $request->email;
        $data= ['name'=>  $request->name];
        $subject =  $request->subject;
        Mail::send('email', $data, function($message) use ($email ,$subject){
            $message->to($email)->subject($subject);
        });
        return redirect()->back()->withErrors(['Thank you for contacint Wegoz. We will be respond you ASAP']);
    }
}
