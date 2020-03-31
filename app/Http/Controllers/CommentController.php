<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Posts $posts)
    {
        request()->validate([
            'content' => 'required|min:5'
        ]);
        
        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;
        
        $posts->comments()->save($comment);
        
        return back();
    }
    
    
}
