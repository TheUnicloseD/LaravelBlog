@extends('layouts/main')

@section('content')
Article: {{$posts->post_content}}<br>
Auteur: {{$posts->post_name}}

@endsection
