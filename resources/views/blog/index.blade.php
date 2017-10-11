@extends('layouts.blog')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blog Posts</h2>
            </div>
            
        </div>
    </div>

    @foreach ($articles as $article)
        <h2>{{ $article->title}}</h2>
        <p class="blog-post-meta">{{ $article->updated_at }} by <a href="#">Janus</a>. Category: <a href="{{ route('list.single',$article->category_id) }}">{{ $article->category->name }}</a></p>
        
         <a class="btn btn-info" href="{{ route('blog.show',$article->id) }}">Read more</a>
    @endforeach
<hr>
    {!! $articles->links() !!}
@endsection
