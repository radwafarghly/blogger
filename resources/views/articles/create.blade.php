@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Articles</div>

                    {!! Form::open(array('route' => 'articles.store','method'=>'POST')) !!}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Content:</strong>
                                {!! Form::textarea('body', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-info" href="{{ route('articles.index') }}">cancle</a>

                        </div>
                    </div>
                    {!! Form::close() !!}

                  </div>
            </div>
        </div>
    </div>
@endsection