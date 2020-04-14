<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create(){
      return view('contact');

    }

    public function store(){
      $data = request()->validate([
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required'
      ]);

        Mail::to('from@example.com')->send(new ContactMail($data));
        
        return redirect("contact")->with("success","Votre message a bien été envoyé !");
    }
}
