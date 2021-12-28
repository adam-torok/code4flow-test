@extends('layouts.website.app')

@section('content')
<section class="container mt-4">
    <div class="row p-md-5">
        <div class="col-md-8 col-12 shadow-sm border-0 card p-5 offset-md-2">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Probléma jelentése</h1>
                    <small>Ha úgy látod, felfedeztél egy hibát az oldalon kérlek jelentsd nekünk, és mi minnél előbb megoldjuk!</small>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <form class="form" action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <label for="title"><b>Probléma megnevezése röviden *</b></label>
                                <input 
                                    type="text"
                                    class="form-control  @error('title') is-invalid @enderror"
                                    name="title"
                                    id="title"
                                    placeholder="Probléma"
                                    value="{{old('title')}}"
                                    title="Probléma">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <label for="text"><b>Probléma leírása *</b></label>
                                <textarea 
                                    style="height: auto!important" 
                                    name="text" 
                                    rows="5" 
                                    class="form-control @error('text') is-invalid @enderror" 
                                    id="text">
                                    {{old('text')}}
                                </textarea>
                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <small>Sikeres elküldést követően, az adminisztrátor választ fog küldeni 2-3 munkanapon belül</small>
                        <div class="form-group mt-2">
                            <div class="col-xs-12 text-center ">
                                <br>
                                <button class="btn btn-dark" type="submit">Elküldés</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection