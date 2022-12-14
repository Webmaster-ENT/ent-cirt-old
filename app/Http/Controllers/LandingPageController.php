<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class LandingPageController extends Controller
{
    public function index()
    {
        // $articles = Article::with('user')->get();
        $articles = Article::with('user')->where('status', 'publish')->orderBy('updated_at', 'desc')->get();
        $user = Auth::user();
        $id = Auth::id();
        return view('index', compact('articles'));
    }
    public function show(Article $article)
    {
        $articles = Article::with('user')->where('status', 'publish')->orderBy('updated_at', 'desc')->limit('3')->get();
        return view('article', compact('article', 'articles'));
    }
}
