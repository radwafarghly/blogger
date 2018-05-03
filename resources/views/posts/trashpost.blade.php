@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All Post Trach</div>
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
                                    <a class="btn btn-primary" href="{{ route('posts.trashrestore',$post->id) }}">restore</a>
                                    <a class="btn btn-danger" href="{{ route('posts.trashdelete',$post->id) }}">delete</a>
                                    <a class="btn btn-primary" href="{{ route('comments.create',$post->id) }}">Add Comment</a>

                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection