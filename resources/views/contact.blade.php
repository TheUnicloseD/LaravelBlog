@extends('layouts/main')

@section('content')
<h1>Contact</h1>
<form method="post" action="/contact">
@csrf
<div>
<input type="text" name="contact_name" value="{{ old('name') }}" placeholder="Titre du projet">
{!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div>
<input type="email" name="contact_email" value="{{ old('email') }}" placeholder="Votre email">
{!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div>
<textarea name="contact_message" value="{{ old('message') }}" placeholder="Description du projet"></textarea>
{!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div>
<input type="submit" value="Créer le projet">
</div>
</form>
@endsection
