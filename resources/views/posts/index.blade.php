@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All Post</div>
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection