<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('website.reports.index',compact('reports'));
    }

    
    public function create()
    {
        return view('website.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $report = new Report($request->all());
        $report->user_id = Auth::user()->id;
        $report->save();
        return redirect()->route('reports.index')->with('success', 'Sikeres bejelentés!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('website.reports.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReportRequest $request, Report $report)
    {
        $report->fill($request->all());
        $report->save();
        return view('website.reports.edit',compact('report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Sikeres törlés');
    }
}
