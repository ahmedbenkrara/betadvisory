<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact');
    }

    public function sendMail(Request $request){
        try{
            Mail::to("ahmed.benkrara12@gmail.com")->send(new ContactMail($request->name, $request->email, $request->sujet, $request->message));
            return back()->with('success', 'E-mail envoyé avec succès!');
        }catch(\Exception $e){
            return back()->with('error', 'Échec de l\'envoi de l\'e-mail. Veuillez réessayer plus tard.');
        }
    }
}
