<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index() {
        $reports = Report::all()->where('is_done', '=', '0');
        return view('backend.report.index', compact('reports'));
    }

    public function isDone(){
        $reports = Report::all()->where('is_done', '=', '1');
        return view('backend.report.done', compact('reports'));
    }


    public function create(Request $request) {
        $report = Report::create([
            'subject' => $request['subject'],
            'body' => $request['body'],
        ]);
    }
}
