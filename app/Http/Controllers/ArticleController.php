<?php

namespace App\Http\Controllers;

// use Dotenv\Util\Str;
use App\Models\Article;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'body' => 'required',
            'thumbnail_url' => 'mimes:jpg,png,jpeg|image|max:1024',
        ]);

        $newName = '';

        if ($request->file('thumbnail_url')) {
            $extension = $request->file('thumbnail_url')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail_url')->storeAs('images', $newName);
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'status' => $request->status,
            'summary' => Str::of(Str::words($request->body, 23))->ltrim('<p>'),
            'body' => $request->body,
            'thumbnail_url' => $request['thumbnail_url'] = $newName
        ]);
        return redirect()->route('article.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('backend.article.edit', compact('article'));
        return redirect()->route('article.index');
    }


    public function destroy(Article $article)
    {
        if ($article->thumbnail_url) {

            Storage::delete($article->thumbnail_url);
        }
        $article->delete();
        return redirect()->route('article.index');
    }

    public function uploadImage()
    {
        $article = new Article();
        $article->id = 0;
        $article->exists = true;

        $images = $article->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $images->getUrl()
        ]);
    }
}
