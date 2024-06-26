<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Article;
use App\Models\Report;
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

    public function storeReport(ReportRequest $request) {
        $newName = '';
        if ($request->file('image_url')) {
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $newName = Str::words($request->id, 1) . '-' . now()->timestamp . '.' . $extension;
            $request->file('image_url')->storeAs('public/images/', $newName);
        }

        Report::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'contact' => $request->contact,
            'image_url' => $request['image_url'] = $newName
        ]);
        return redirect()->route('index');
    }
}
