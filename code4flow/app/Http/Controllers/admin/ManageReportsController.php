<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateReportRequest;
use App\Models\Report;
use App\Models\ReportResponse;
use App\Notifications\ReportStatusChange;
use Illuminate\Http\Request;

class ManageReportsController extends Controller
{
    public function index(){
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function edit($id){
        $report = Report::findOrFail($id);
        return view('admin.reports.edit',compact('report'));
    }

    public function update(UpdateReportRequest $request, $id){
        $report = Report::findOrFail($id);
        $report->fill($request->all());
        switch ($request->status) {
            case 'WAITING':
                $report->status = $report->setWaiting();
                break;

            case 'RESOLVED':
                    $report->status = $report->setResolved();
                    break;

            case 'DECLINED':
                $report->status = $report->setDeclined();
                break;
        }

        $report->user->notify(new ReportStatusChange($report));

        // Save a response
        $report->response()->updateOrCreate([],['report_id' => $report->id, 'text' => trim($request->response)]);

        $report->save();
        alert()->success('Sikeresen frissítetted a bejelentést');
        return redirect()->route('admin:reports.edit',$id);
    }

    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
        alert()->success('Sikeresen törölted a bejelentést');
        return redirect()->route('admin:reports.index');
    }
}
