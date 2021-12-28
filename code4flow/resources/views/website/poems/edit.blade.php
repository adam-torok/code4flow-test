@extends('layouts.website.app')
@push('scripts')
<script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
@endpush

@push('styles')
    <style>
        .ck-content{
            min-height: 200px;
        }
        select{
            padding: 0!important;
            padding-left: 15px!important;
        }
    </style>
@endpush

@section('content')
<section class="container mt-4">
    <div class="row p-md-5">
        <div class="col-md-8 col-12 shadow-sm border-0 card p-5 offset-md-2">

            <div class="d-flex justify-content-between align-items-center">
                @if($poem->isWaiting())
                <div>
                    <h1>Vers szerkesztése</h1>
                    <small>Az adminisztrátor jóváhagyását követően megjelenik a verseskötetben</small>
                    <br>
                    <small>Utolsó modosításod dátuma: {{$poem->updated_at}}</small>
                </div>
                @else
                <div>
                    <h1>Vers megtekintése</h1>
                    <small>Már elfogadott, illetve elutasított verset nem tudsz szerkeszteni!</small>
                </div>
                @endif
            </div>

            <div class="row mt-4">

                <div class="col-12">
                    <form class="form" action="{{ route('user-poems.update', $poem) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-12 col-md-6">
                                <label for="title"><b>Cím *</b></label>
                                <input 
                                    @if($poem->isApproved() || $poem->isDeclined())
                                        disabled
                                    @endif
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    id="title"
                                    placeholder="Vers címe"
                                    value="{{$poem->title}}"
                                    title="Vers címe">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="category"><b>Vers kategóriája *</b></label>
                                <select 
                                    @if($poem->isApproved() || $poem->isDeclined())
                                        disabled
                                    @endif
                                    class="form-control @error('category') is-invalid @enderror"
                                    name="category"
                                    id="category"
                                    title="Vers kategóriája">
                                    @foreach ($categories as $category)
                                    <option @if($category->id == $poem->category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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
                                    @if($poem->isApproved() || $poem->isDeclined())
                                        disabled
                                    @endif
                                    name="text" 
                                    id="content">{{$poem->text}}
                                </textarea>
                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if($poem->isWaiting())
                        <div class="form-group mt-2">
                            <div class="col-xs-12 text-center ">
                                <br>
                                <button class="btn btn-primary" type="submit">Mentés</button>
                            </div>
                        </div>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    CKEDITOR.replace('content',{
        language: 'hu',
    });
</script>
@endsection