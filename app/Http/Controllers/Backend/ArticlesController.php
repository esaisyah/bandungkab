<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $articles = Article::paginate(15);

        return view('backend.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('backend.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['judul' => 'required', 'content' => 'required', ]);

        Article::create($request->all());

        Session::flash('flash_message', 'Article added!');

        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('backend.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('backend.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['judul' => 'required', 'content' => 'required', ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        Session::flash('flash_message', 'Article updated!');

        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Article::destroy($id);

        Session::flash('flash_message', 'Article deleted!');

        return redirect('admin/articles');
    }
}
