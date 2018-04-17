@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All Articles</div>
                    <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($articles as $key => $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->body }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
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