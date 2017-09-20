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
        // $articles = Post::latest()->paginate(5);
        // return view('posts.index',compact('articles'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $articles = Post::latest()->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
        // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('articles.index')
                        ->with('success','Article created successfully');
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
        return view('posts.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Post::find($id);
        return view('articles.edit',compact('article'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::find($id)->update($request->all());
        return redirect()->route('articles.index')
                        ->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();
        return redirect()->route('articles.index')
                        ->with('success','Article deleted successfully');
    }
}
