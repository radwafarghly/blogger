@extends('layouts.app')
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).on('click','#addpost',function () {
        var form = $('#post').serialize();
        var route=$('#post').attr('action');

        alert(route);

        return false;
    });

</script>--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Post</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'posts.store','method'=>'POST')) !!}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {!! Form::text('title', null, array('placeholder' => 'Title','value' => '{{old(title)}}','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Content:</strong>
                                {!! Form::textarea('body',null, array('placeholder' => 'Description','value' => '{{old(body)}}','class' => 'form-control','style'=>'height:100px')) !!}
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-info" href="{{ route('posts.index') }}">cancle</a>

                        </div>
                    </div>
                    {!! Form::close() !!}

                  </div>
            </div>
        </div>
    </div>
@endsection