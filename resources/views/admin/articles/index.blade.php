@extends('layouts.admin')

@section('content')

    <div class="modal fade" id="deleteModal" tabindex="-3" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="deleteModalLabel">Delete Blog</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this blog?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="deleteBtn" type="button" class="btn btn-warning" href="#">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-primary pull-right" href="{!! route('articles.create') !!}">Add New</a>
        <h1 class="page-header">Blog</h1>
    </div>

    <div class="row">

        @if($articles->count() === 0)
            <div class="well text-center">No blogs found.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th width="200px" class="text-right">Actions</th>
                </thead>
                <tbody>

                @foreach($articles as $article)
                    <tr>
                        <td><a href="{!! route('articles.edit', [$article->id]) !!}">{!! $article->id !!}</a></td>
                        <td class="raw-m-hide">{!! $article->title !!}</td>
                        <td class="raw-m-hide">{!! $article->created_at !!}</td>
                        <td class="text-right">
                            <form method="post" action="{!! url('articles/'.$article->id) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="delete-btn btn btn-xs btn-danger pull-right" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a class="btn btn-xs btn-default pull-right raw-margin-right-8" href="{!! route('articles.edit', [$article->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <hr>
    {{ $articles->links() }}
    </div>
@endsection
