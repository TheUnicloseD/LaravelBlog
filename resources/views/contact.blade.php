@extends('layouts.app')

@section('content')
<h1>Contact</h1>

<form action="/contact" method="post">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Votre nom...">
        @error('name')
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Votre email...">
        @error('email')
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Votre message..." cols="30" rows="10">{{ old('message') }}</textarea>
        @error('message')
            <div class="invalid-feedback">
                {{ $errors->first('message') }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" >Envoyer mon message</button>
</form>

@endsection