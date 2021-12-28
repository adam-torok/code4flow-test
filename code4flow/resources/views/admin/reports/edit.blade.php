@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', "$report->title")

@push('styles')
<style>
    .ck-content {
        min-height: 200px;
    }

    select {
        padding: 0 !important;
        padding-left: 15px !important;
    }
</style>
@endpush

@section('content')
<div class="card mt-2 @if($report->isWaiting())card-warning @endif @if($report->isDeclined()) card-danger @endif @if($report->isResolved()) card-success @endif">
    <div class="card-header">
        <div class="ml-auto user-block">
            <span class="username ml-auto"><a href="{{route('admin:users.show',$report->user->id)}}">{{$report->user->getName()}}</a></span>
            <span class="description ml-auto mt-1 text-white">Megosztotta - {{$report->getSubmittedDate()}}</span>
        </div>
    </div>
    <div class="card-body">

        <form method="POST" action="{{route('admin:reports.update',$report)}}">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="title">Bejelentés címe</label>
                    <input 
                        id="title"
                        type="text" 
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{$report->title}}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label for="text"><b>Bejelentés szövege *</b></label>
                    <textarea
                        name="text"
                        id="content"
                        class="form-control">{{$report->text}}</textarea>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-12">
                    <label for="response">Megjegyzés</label>
                    <input 
                    id="response"
                    type="text" 
                    name="response"
                    class="form-control @error('response') is-invalid @enderror"
                    value="@if($report->response){{$report->response->text}}@endif"
                    >
                        @error('response')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label for="status"><b>Státusz</b></label>
                    <select class="form-control" name="status" id="status">
                        <option @if($report->isWaiting()) selected @endif value="WAITING">Várakozik</option>
                        <option @if($report->isResolved()) selected @endif value="RESOLVED">Megoldva</option>
                        <option @if($report->isDeclined()) selected @endif value="DECLINED">Elutasítva</option>
                    </select>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <small class="text-muted"><b>Utolsó módosítás dátuma {{$report->getModificationDate()}}</b></small>

            <div class="col-12 mt-4 d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">Mentés</button>
            </div>
        </form>

        <form id="delete-form" method="POST" action="{{route('admin:reports.destroy', $report->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="d-flex align-items-center btn btn-sm ml-auto btn-danger">Törlés</button>
        </form>
    </div>
</div>

@endsection

@push('js')
<script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
@endpush