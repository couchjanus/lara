@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Updated At</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
      <tr>
        <td>{{$article['id']}}</td>
        <td>{{$article['title']}}</td>
        <td>{{$article['updated_at']}}</td>
        <td><a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('articles.destroy',$article->id) }}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
@endsection