@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', "$poem->title")

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
<div class="card mt-2 @if($poem->isWaiting())card-warning @endif @if($poem->isDeclined()) card-danger @endif @if($poem->isApproved()) card-success @endif">
    <div class="card-header">
        <div class="ml-auto user-block">
            <span class="username ml-auto"><a href="{{route('admin:users.show',$poem->user->id)}}">{{$poem->user->getName()}}</a></span>
            <span class="description ml-auto mt-1 text-white">Megosztotta - {{$poem->getSubmittedDate()}}</span>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin:poems.update',$poem)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="title">Vers címe</label>
                    <input 
                        id="title"
                        type="text" 
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{$poem->title}}">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="category">
                        <b>Vers kategóriája *</b>
                    </label>
                    <select 
                        class="form-control @error('category') is-invalid @enderror" 
                        name="category" 
                        id="category"
                        title="Vers kategóriája">
                        @foreach ($categories as $category)
                        <option @if($category->id == $poem->category->id) selected @endif
                            value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label for="text"><b>Vers szövege *</b></label>
                    <textarea
                        name="text"
                        id="content">{{$poem->text}}</textarea>
                    @error('text')
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
                        <option @if($poem->isWaiting()) selected @endif value="WAITING">Várakozik</option>
                        <option @if($poem->isApproved()) selected @endif value="APPROVED">Elfogadva</option>
                        <option @if($poem->isDeclined()) selected @endif value="DECLINED">Elutasítva</option>
                    </select>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <small class="text-muted"><b>Utolsó módosítás dátuma {{$poem->getModificationDate()}}</b></small>
            <div class="col-12 mt-4 d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">Mentés</button>
            </div>
        </form>

        <form id="delete-form" method="POST" action="{{route('admin:poems.destroy', $poem->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="d-flex align-items-center btn btn-sm ml-auto btn-danger">Törlés</button>
        </form>
    </div>
</div>

@endsection

@push('js')
<script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content',{
        language: 'hu',
    });
</script>
@endpush