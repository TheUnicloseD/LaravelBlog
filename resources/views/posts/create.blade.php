@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::open(['route'=>'posts.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
        @include('posts.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
