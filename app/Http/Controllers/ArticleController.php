<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
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

  public function create()
  {
    return view('artikel.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|max:200',
      'slug' => 'required|unique:articles,slug',
      'excerpt' => 'required',
      'body' => 'required',
      'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
      'tag' => 'nullable',
      'read_time' => 'nullable',
      'published_at' => 'nullable|date',
    ]);

    if ($request->hasFile('image')) {
      $path = $request->file('image')->store(
        'articles',
        'r2'
      );

      $data['image'] = $path; // simpan path saja
    }

    Article::create($data);

    return redirect()->back()->with('success', 'Artikel berhasil ditambahkan');
  }
}
