@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Post Details </div>

                    <a class="btn btn-info" href="{{ route('posts.index') }}">Back</a>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {{ $post->title}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Body:</strong>
                                {{ $post->body }}
                            </div>
                        </div>
                    </div>
                    <div id="backend-comments" style="margin-top: 50px;">
                        <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Comment</th>
                                <th width="70px"></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($post->comments as $comment)
                                <tr>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>

            </div>
        </div>
    </div>
@endsection