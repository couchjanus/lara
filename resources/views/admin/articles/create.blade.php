@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1 class="page-header">Blog</h1>
    </div>

    <div class="row">
        @if (count($errors) > 0)
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                      <li>{!! $error !!}</li>
                   @endforeach
               </ul>
           </div>
        @endif

        {!! Form::open(['method' => 'POST', 'route' => 'articles.store', 'class' => 'add']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Article
                </div>
                

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Article Title']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif

                            
                            {!! Form::label('content', 'Content') !!}
                            {!! Form::textarea('content', old('content'), array('class' => 'form-control')) !!}
                            
                        </div>
                    </div>
                            
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            {{ Form::label('category_id', 'Select Category:') }}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <a href="{!! url('/articles') !!}" class="btn btn-default raw-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

    {!! Form::close() !!}
        
    </div>
    
@endsection
