@extends('layouts.app')

@section('content')

    
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
    

@endsection