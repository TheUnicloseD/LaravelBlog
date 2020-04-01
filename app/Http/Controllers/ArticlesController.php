<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{

  public function index() {
      $posts = \App\Posts::find(1);
      return view('articles',array('posts' => $posts));
  }

  public function show($post_name) {
    $posts = \App\Posts::where('post_name',$post_name)->first(); //get first post with post_nam == $post_name
    return view('articles',array( //Pass the post to the view
    'posts' => $posts
 ));
}


}
