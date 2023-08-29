<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{


    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }


    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;

        $article->title = $request->title;
        $article->body = $request->body;

        $article->save();

        return redirect('/articles');
    }

    // public function update(MemoRequest $request, $id){
    // }
}
