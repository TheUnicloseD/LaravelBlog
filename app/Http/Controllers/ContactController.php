<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
      return view('contact');

    }

    public function store(ContactRequest $request){
      $request->validated();
      $contact = $request->all();
      \App\Contact::create($contact);
      return redirect("contact")->with("message","Demande de contact envoyé");

    }
}
