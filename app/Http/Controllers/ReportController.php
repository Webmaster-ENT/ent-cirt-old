<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReportRequest;


class ReportController extends Controller
{
    //
    public function index()
    {
        $reports = Report::all()->where('is_done', '=', '0');
        return view('backend.report.index', compact('reports'));
    }

    public function isDone()
    {
        $reports = Report::all()->where('is_done', '=', '1');
        return view('backend.report.done', compact('reports'));
    }

    public function updateDone($id)
    {
        $report = Report::find($id);
        $report->is_done = true;
        $report->save();
        return redirect()->route('report.index');
    }

    public function store(ReportRequest $request)
    {

        $newName = '';

        if ($request->file('image_url')) {
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $newName = Str::words($request->subject, 2) . '-' . now()->timestamp . '.' . $extension;
            $request->file('image_url')->storeAs('images/report/', $newName);
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
