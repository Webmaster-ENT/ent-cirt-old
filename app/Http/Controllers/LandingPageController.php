<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class LandingPageController extends Controller
{
    public function index()
    {
        //
    }
    public function show(Article $article)
    {
        return view('article', compact('article'));
    }
}
