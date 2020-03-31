@extends('layouts.app')

@section('content')

@if (request()->is('articles'))
    
     <h1>Articles</h1>
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th width="80px">No</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th width="140px" class="text-center">
                <a href="{{route('posts.create')}}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i>
                </a>
            </th>
        </tr>
        <?php $no=1; ?>
        @foreach ($posts as $key => $value)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->post_title}}</td>
                <td>{{$value->post_content}}</td>
                <td><a class="btn btn-info btn-sm" href="{{route('posts.show',$value->id)}}">
                    <i class="fa fa-eye"> </i></a>
                    <a class="btn btn-primary btn-sm" href="{{route('posts.edit',$value->id)}}">
                    <i class="fa fa-pencil"> </i></a>
                {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $value->id],'style'=>'display:inline']) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> 
                {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    
@else

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
@endif
@endsection