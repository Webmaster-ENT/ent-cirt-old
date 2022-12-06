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
            // 'status' => 'required',
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
            'status' => 'required',
            'body' => 'required',
            'thumbnail_url' => 'mimes:jpg,png,jpeg|image|max:1024',
        ]);

        $newName = '';

        $values = [
            'title' => $request->title,
            'slug' => Str::slug(Str::words($request->title, 15)),
            'user_id' => Auth::id(),
            'status' => $request->status,
            'summary' => Str::of(Str::words($request->body, 23))->ltrim('<p>'),
            'body' => $request->body,
        ];

        if ($request->file('thumbnail_url') != null) {

            $destination = app_path("storage/images/{$article->thumbnail_url}");
            if (File::exists($destination)) {
                unlink($destination);
            }
            $extension = $request->file('thumbnail_url')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail_url')->storeAs('images', $newName);

            $values['thumbnail_url'] = $newName;
        }
        $article->update($values);

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
        if ($article->thumbnail_url) {

            Storage::delete($article->thumbnail_url);
        }
        $article->delete();
        return redirect()->route('article.index');
    }
}
