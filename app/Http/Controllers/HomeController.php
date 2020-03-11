<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index(){
			$posts = \App\Posts::orderBy('id','DESC')->paginate(3); //get all posts
    		return view('welcome',array(
           'posts' => $posts));
    }
}


