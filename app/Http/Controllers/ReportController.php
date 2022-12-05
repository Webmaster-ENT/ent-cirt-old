<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index() {
        $reports = Report::all();
        return view('backend.report.index', compact('reports'));
    }

    public function create(Request $request) {
        $report = Report::create([
            'subject' => $request['subject'],
            'body' => $request['body'],

        ]);
    }
}
