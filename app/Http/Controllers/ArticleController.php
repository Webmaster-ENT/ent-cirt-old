<?php

namespace App\Http\Controllers;

// use Dotenv\Util\Str;
use Illuminate\Support\Str;
use App\Models\Article;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->get();
        $user = Auth::user();
        $id = Auth::id();
        return view('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ispublished' => 'required',
            'summary' => 'required',
            'body' => 'required',
            'thumbnail_url' => 'required',
        ]);

        $imageName = time() . '.' . $request->thumbnail_url->extension();

        $request->thumbnail_url->move(public_path('images'), $imageName);

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'ispublished' => $request->ispublished,
            'summary' => $request->summary,
            'body' => $request->body,
            'thumbnail_url' => $request->thumbnail_url,
        ]);
        return redirect()->route('article.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('backend.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'ispublished' => 'required',
            'summary' => 'required',
            'body' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'ispublished' => $request->ispublished,
            'summary' => $request->summary,
            'body' => $request->body,
            'thumbnail_url' => $request->thumbnail_url,
        ]);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
