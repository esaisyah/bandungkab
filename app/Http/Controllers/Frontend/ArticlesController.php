<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('frontend.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('frontend.articles.show', compact('article'));
    }
}
