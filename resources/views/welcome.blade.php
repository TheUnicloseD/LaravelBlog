@extends('layouts.app')
@section('content')

<h1>SAH QUEL BLOG LARAVEL</h1>

<h3>Réalisé par Abdessami GHODBANE et Romain PINEL--GERMAIN | M1 WIC</h3>

<p>Voici les trois derniers articles publiés :</p>

<ul>
@foreach ( $posts as $post )

  <li><a href="http://127.0.0.1:8000/articles/{{$post->post_title}}">{{ $post->post_title}} </a></li>

@endforeach
</ul>



@endsection
