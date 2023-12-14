<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
   public function contact(Request $request)
   {
      if($request->isMethod('post'))
      {
        $addnew =  new Contact;
        $addnew->name = $request->get('name');
        $addnew->email = $request->get('email');
        $addnew->text = $request->get('message');
        $addnew->save();
      }

      $data = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'message' => $request->get('message'),
      ];

      Mail::to('harbanskaur1602@gmail.com')->send(new SendMail($data));
      return redirect()->back()->with('success','Your Message is Sent Successfully..');
    }
    
}
