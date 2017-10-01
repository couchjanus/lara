<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Post::latest()->get();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        return view('admin.articles.create')->with('categories', $categories)->with('tags', $tags);

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

        // store in the database
        $article = new Post;

        $article->title = $request->title;
        $article->content = $request->content;
        
        $article->category_id = $request->category_id;

        $article->save();

        $article->tags()->sync($request->input('tag_list'), false);

        // Post::create($request->all());
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

        return view('admin.articles.show',compact('article'));
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
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
      
        // return the view and pass in the var we previously created
        return view('admin.articles.edit')->withArticle($article)->withCategories($categories)->withTags($tags);

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
        // Post::find($id)->update($request->all());

        $article = Post::find($id);;
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->category_id = $request->input('category_id');

        $article->save();
        
        $article->tags()->sync($request->input('tag_list'));
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
        return redirect()->route('admin.articles.index')
                        ->with('success','Article deleted successfully');
    }
}
