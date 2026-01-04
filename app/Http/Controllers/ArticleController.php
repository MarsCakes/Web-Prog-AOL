<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
  public function index()
  {
    $articles = Article::where('published_at', '<=', now())
      ->orderBy('published_at', 'desc')
      ->get();
    return view('artikel.index', compact('articles'));
  }

  public function show($id, $slug = null)
  {
    $article = Article::where('slug', $id)->firstOrFail();
    return view('artikel.show', compact('article'));
  }
}
