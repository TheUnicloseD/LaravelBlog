@extends('layouts/main')

@section('content')
<h1>Article</h1>

<div class="blog-post">
        <h3>{{$posts->post_title}} <small>{{$posts->post_date}}</small></h3>
        <img class="thumbnail" src="https://placehold.it/850x350">
        <p>{{$posts->post_content}}</p>
        <div class="callout">
          <ul class="menu simple">
            <li><a href="#">{{$posts->author->name}}</a></li>
            <li><a href="#">Comments: 3</a></li>
          </ul>
        </div>
      </div>

@endsection
