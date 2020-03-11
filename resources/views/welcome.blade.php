@extends('layouts/main')
@section('content')
<h1>Home</h1>
<h1>Articles</h1>
<ul>
@foreach ( $posts as $post )

  <li><a href="http://127.0.0.1:8000/Articles/{{$post->post_name}}">{{ $post->post_title}} </a></li>

@endforeach
</ul>
<h1>Contacts</h1>


@endsection
