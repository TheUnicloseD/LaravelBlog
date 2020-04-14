<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Validator;
use DB;

class ArticlesController extends Controller
{

    
  public function index() {
      
      $posts = Posts::all();
      $posts = Posts::orderBy('created_at','desc')->paginate(5);
       return view('posts.articles', compact('posts'));
  }
    
    public function list(){
        $posts = Posts::orderBy('created_at','desc')->paginate(3);
        return view('welcome', compact('posts'));

    }
    
    
 public function affiche($id) {
    $posts = \App\Posts::where('id',$id)->first(); //get first post with post_nam == $post_name

  return view('posts.show',array( //Pass the post to the view
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
          'image'=>'sometimes|image|max:5000'
        ]);
         
         $posts = new Posts;
         $posts->user_id = Auth::id();
         $posts->post_title = $request->post_title;
         $posts->post_content = $request->post_content;
         
         if($request->hasFile('image')) {
            $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $filename = time() . '.' . $extension;
             $file->move('uploads/posts/', $filename);
             $posts->image = $filename;
        } 
        
         
         $posts->save();
         
        
        return redirect('posts/articles')->with('success','Article créé avec succès');
        
    }
         
    
    
    public function edit($id)
    {
         $posts = Posts::find($id);
        
         if (Auth::id() == $posts->user_id || Auth::user()->can('manage-users')) {
             return view('posts.edit',compact('posts'));
         }
    
        else{
            return redirect('posts/articles')->with('error','Seulement l\'auteur de cet article peut faire une modification !');
        }
        
    }

    public function update(Request $request, $id)
    {
        
        $posts = Posts::find($id);
        
        
        $this->validate($request,[
          'post_title'=>'required|string|max:255',
          'post_content'=>'required',
            'image'=>'image|max:5000'
        ]);
        
         $posts->post_title = $request->post_title;
         $posts->post_content = $request->post_content;
         
        if($request->hasFile('image')) {
            $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $filename = time() . '.' . $extension;
             $file->move('uploads/posts/', $filename);
             $posts->image = $filename;
        } 
        
        $posts->save($request->all());
        
       
        
        return redirect('posts/articles')->with('success','Article modifié avec succès');
        
    }
    
     public function destroy($id)
    {
         $posts = Posts::find($id);
         
         if (Auth::id() == $posts->user_id || Auth::user()->can('manage-users')) {
             Posts::find($id)->delete();
             return redirect('posts/articles')->with('success','Article supprimé avec succès');
         }
        
         else{
            return redirect('posts/articles')->with('error','Seulement l\'auteur de cet article peut faire une suppresion !');
        }
          
    }
   
    
}
