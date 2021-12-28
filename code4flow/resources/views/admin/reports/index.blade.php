@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Versek')

@section('content_header')
<h1>Versek kezelése</h1>
@stop

@section('content')
<div class="row col">
    <div class="card col-12 p-md-4">
        <div class="table-responsive">
            <table id="table" class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Jelentés címe</th>
                        <th>Dátum</th>
                        <th>Státusz</th>
                        <th>Létrehozó</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr data-route="{{route('admin:reports.edit', $report)}}" style="cursor: pointer;">
                        <td>
                            {{$report->id}}
                        </td>
                        <td>
                            {{$report->title}}
                        </td>
                        <td>
                            {{$report->created_at}}
                        </td>
                        <td>
                            {!!$report->getStatusTemplated()!!}
                        </td>
                        <td>
                            {{$report->user->getName()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop