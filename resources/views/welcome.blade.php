@extends('layouts.app')
@section('content')

<h1>Bienvenue sur notre BLOG LARAVEL</h1>

<h5 style="color:#3ab3ee;">Réalisé par Abdessami GHODBANE et Romain PINEL--GERMAIN | M1 WIC</h5>
<hr>
<p>Voici les trois derniers articles publiés :</p>


@foreach($posts->chunk(3) as $chunk)
             <div class="row">
                  @foreach ($chunk as $post)
                       <div class="col col-md-4">
                          @if($post->image)
                           <img class="h-50 w-100" alt="posts-image" src="{{ asset('uploads/posts/' . $post->image )}}" />
                            @endif
                            <div class="p-2 bg-white">
                                <strong> {{$post->post_title}} </strong><br>
                                <span>{{ str_limit($post->post_content, $limit=45, $end = '...') }}</span><br><br>
                                <center><a class="btn btn-primary btn-sm" href="{{route('posts.show',$post->id)}}">
                                    <i class="fa fa-eye"></i> Voir l'article</a></center>
                            </div>
                            
                       </div>
                    @endforeach
               </div>
            @endforeach

@endsection
