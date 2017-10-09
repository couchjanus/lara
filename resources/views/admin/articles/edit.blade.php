@extends('layouts.admin')

@section('content')
    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
    // https://www.tinymce.com/download/
    // https://github.com/vikdiesel/justboil.me
    // https://github.com/ktquez/laravel-tinymce
          tinymce.init({
            selector : "textarea",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        });
    </script>


    <div class="row">
        <h1 class="page-header">Blog</h1>
    </div>

    <div class="row">
        <div class="">
            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch', 'class' => 'edit']) !!}
        
                 <div class="col-md-8">
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2']) !!}

                    {!! Form::label('tag_list', 'Tags:') !!}
                    {!! Form::select('tag_list[]', $tags, $article->tags, ['id' => 'tag_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}

                    {{ Form::label('content', "Content:", ['class' => 'form-spacing-top']) }}
                    {{ Form::textarea('content', null, ['class' => 'form-control']) }}

                    <div class="form-group text-right">
                    <a href="{!! url('/articles') !!}" class="btn btn-default raw-left">Cancel</a>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                 
                    </div>

            {!! Form::close() !!}
                
        </div>
        
            <div class="col-md-4">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($article->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($article->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('articles.show', 'Show', array($article->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>


                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('articles.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
        
        
    </div>

@stop

