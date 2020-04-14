<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
     /**
    * Get the user that authored the post.
    */
    //protected $fillable = ['user_id','post_title', 'post_content'];
    //protected $dates = ['created_at', 'updated_at'];
    
    protected $guarded = [];
    
   public function author()
   {
       return $this->belongsTo('App\User','user_id');
   }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable')->latest();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
