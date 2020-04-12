@extends('layouts.app')
@section('content')
<h1>Article</h1>
    <div class="blog-post">
           
            <h3>{{$posts->post_title}}</h3>
            <img class="thumbnail" src="https://placehold.it/850x350">
            <p>{{$posts->post_content}}</p>
            <div class="callout">
              <ul class="menu simple">
                <li><a href="#">
                 @if(is_null($posts->author))
                                        Aucun auteur
                                    @else
                                        {{ $posts->author->name }}
                                    @endif</a></li>

              </ul>
            </div>

        <hr>
        <h5>Commentaires</h5> 

        @forelse ($posts->comments as $comment)
            <div class="card mb-2">
                   <div class="card-body">
                        {{ $comment->content }}
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {{ $comment->created_at->format('d/m/Y') }}</small>
                            <span class="badge badge-primary">{{ $comment->user->name }}</span>
                        </div>
                    </div>
            </div>
        @empty
            <div class="alert alert-info">Aucun commentaire pour cet article </div>
        @endforelse
        <form action="{{$posts->id}}/comments" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="content">Votre commentaire</label>
                <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="5"></textarea>
                @error('content')
            <div class="invalid-feedback">{{$errors->first('content')}}</div>
             @enderror
            </div>

         <button type="submit" class="btn btn-primary">Soumettre mon commentaire</button>
        </form>
    </div>
@endsection
