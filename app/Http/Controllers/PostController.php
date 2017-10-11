<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Post::latest()->paginate(2);
        return view('blog.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Post::find($id);
        return view('blog.show',compact('article'));
    }


}
