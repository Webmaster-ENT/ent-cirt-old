<?php

namespace App\Http\Controllers;

// use Dotenv\Util\Str;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Markdown\Facades\Markdown;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('user')->get();
        $user = Auth::user();
        $id = Auth::id();
        return view('backend.article.index', compact('articles'));
    }

    function create()
    {
        return view('backend.article.create');
    }

    public function store(ArticleRequest $request)
    {
        $newName = '';
        if ($request->file('thumbnail_url')) {
            $extension = $request->file('thumbnail_url')->getClientOriginalExtension();
            $newName = Str::words($request->title, 2) . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail_url')->storeAs('images', $newName);
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'status' => $request->status,
            'summary' => Str::of(Str::words($request->body, 23)),
            'body' => Markdown::convert($request->body)->getContent(),
            //'body' => $request->body,
            'thumbnail_url' => $request['thumbnail_url'] = $newName
        ]);
        return redirect()->route('article.index');
    }

    public function show(Article $article)
    {
        // $article = Article::with('user')->whre->paginate();
        return view('backend.article.show', [
            'article' => $article,
        ]);
    }

    public function edit(Article $article)
    {
        return view('backend.article.edit', compact('article'));
        return redirect()->route('article.index');
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $values = [
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'status' => $request->status,
            'summary' => Str::of(Str::words($request->body, 23)),
            'body' => $request->body,
        ];

        $newName = '';

        if ($request->file('thumbnail_url')) {

            if ($article->thumbnail_url) {
                unlink('storage/images/' . $article->thumbnail_url);
                $extension = $request->file('thumbnail_url')->getClientOriginalExtension();
                $newName = Str::words($request->title, 2) . '-' . now()->timestamp . '.' . $extension;
                $request->file('thumbnail_url')->storeAs('public/images', $newName);
            }

            $values['thumbnail_url'] = $newName;
        }
        $article->update($values);

        return redirect()->route('article.index');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail_url) {

            unlink('storage/images/' . $article->thumbnail_url);
        }
        Article::destroy($article->id);
        // $article->delete();
        return redirect()->route('article.index');
    }

    // public function uploadImage()
    // {
    //     $article = new Article();
    //     $article->id = 0;
    //     $article->exists = true;

    //     $images = $article->addMediaFromRequest('upload')->toMediaCollection('images');

    //     return response()->json([
    //         'url' => $images->getUrl()
    //     ]);
    // }
}
