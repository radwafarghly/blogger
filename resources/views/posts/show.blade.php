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


                </div>
            </div>
        </div>
    </div>
@endsection