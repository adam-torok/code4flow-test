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
        toast()->success('Sikeres bejelentés!', 'Bejelentést követően felülvizsgáljuk esetedet, és minnél előbb kijavítjuk a bejelentett hibát!');
        return redirect()->route('reports.index');
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
    public function update(StoreReportRequest $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->fill($request->all());
        $report->save();
        toast()->success('Sikeres bejelentés frissítés!', 'Bejelentésedet sikeresen frissítetted!');
        return view('website.reports.edit',compact('report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        toast()->success('Sikeresen törölted a bejelentésedet!');
        return redirect()->route('reports.index');
    }
}
