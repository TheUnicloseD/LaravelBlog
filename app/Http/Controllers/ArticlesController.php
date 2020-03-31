<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    
  public function index(Posts $posts) {
      $posts = Posts::all();
       return view('posts.articles', compact('posts'));
  }
    
    public function list(){
        $posts = Posts::orderBy('post_date','desc')->paginate(3);
        return view('welcome', compact('posts'));

    }
    
    
 public function affiche($post_title) {
    $posts = \App\Posts::where('post_title',$post_title)->first(); //get first post with post_nam == $post_name

  return view('posts.articles',array( //Pass the post to the view
    'posts' => $posts
 ));
}

    public function show($id)
    {
      $posts = Posts::find($id);
      return view('posts.show',compact('posts'));
    }
  

    
   public function create()
    {
        return view('posts.create');
    }
 
     
        
     public function store(Request $request)
    {
        $this->validate($request,[
          'post_title'=>'required|string|max:255',
          'post_content'=>'required',   
        ]);
        
         $posts = new Posts;
         $posts->user_id = Auth::id();
         $posts->post_title = $request->post_title;
         $posts->post_content = $request->post_content;
         
         $posts->save();
         
        
        return redirect()->route('posts.articles')->with('success','Article créé avec succès');
        
    }
         



        
    
    
    
    public function edit($id)
    {
        $posts = Posts::find($id);
        return view('posts.edit',compact('posts'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'post_title' => 'required',
          'post_content' => 'required',
        ]);
        Posts::find($id)->update($request->all());
        
        return redirect('posts/articles');
        
    }
    
     public function destroy($id)
    {
        Posts::find($id)->delete();
        return redirect()->route('posts.articles')->with('success','Article supprimé avec succès');
    }
}
