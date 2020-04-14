@extends('layouts.app')

@section('content')
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
      @endif
    
    @auth
    <h1 class="d-inline"><i class="fa fa-newspaper-o"></i> | ARTICLES <a href="{{route('posts.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Ajouter</a></h1>
    <hr>  
    
    <div class="container">
       @foreach ($posts as $post)
        <div class="row mb-4">
            
                <div class="col-12 col-md-8">
                    <div class="p-4 bg-white">
                        <strong>{{$post->post_title}}</strong><br>
                        <span>{{ str_limit($post->post_content, $limit=85, $end = '...') }}</span><br>
                       
                        <small>@if(is_null($post->user)) Aucun auteur 
                                @else {{$post->user->name}} @endif - {{$post->created_at->format('d/m/Y')}}</small><br>
                        <center><a class="btn btn-primary btn-sm" href="{{route('posts.show',$post->id)}}">
                                    <i class="fa fa-eye"></i> Voir l'article</a>
                                <a class="btn btn-dark btn-sm" href="{{route('posts.edit',$post->id)}}">
                                    <i class="fa fa-pencil"></i> Editer l'article</a>      
                                 {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</button> 
                                {!! Form::close() !!}        
                                    
                        </center>
                    </div>
                </div>
                <div class="col-8 col-md-3">    
                   <picture>
                    @if($post->image)
                        <img class="img-responsive" alt="posts-image" src="{{ asset('uploads/posts/' . $post->image )}}" height="145" width="200"/>
                    @endif
                    </picture>
                </div>
               
            
        </div>
        @endforeach
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                {{$posts->links() }}
            </div>
        </div>
    </div>
    
    
    @endauth
    
    @guest
    <h1><i class="fa fa-newspaper-o"></i> | ARTICLES </h1>
    <strong><span style="color:#0B9663;">Connectez-vous pour ajouter un article</span></strong>
    <hr>  
     <div class="container">
       @foreach ($posts as $post)
        <div class="row mb-4">
            
                <div class="col-12 col-md-8">
                    <div class="p-4 bg-white">
                        <strong>{{$post->post_title}}</strong><br>
                        <span>{{ str_limit($post->post_content, $limit=85, $end = '...') }}</span><br>
                        <small>@if(is_null($post->user)) Aucun auteur 
                                @else {{$post->user->name}} @endif - {{$post->created_at->format('d/m/Y')}}</small><br>
                        <center><a class="btn btn-primary btn-sm" href="{{route('posts.show',$post->id)}}">
                                    <i class="fa fa-eye"></i> Voir l'article</a>
                        </center>
                    </div>
                </div>
                
                <div class="col-8 col-md-3">    
                   <picture>
                    @if($post->image)
                        <img class="img-responsive" alt="posts-image" src="{{ asset('uploads/posts/' . $post->image )}}" height="145" width="200"/>
                    @endif
                    </picture>
                </div>
               
            
        </div>
        @endforeach
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                {{$posts->links() }}
            </div>
        </div>
    </div>
    
    @endguest
    

@endsection