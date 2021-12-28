@extends('layouts.website.app')

@section('content')
<section class="container mt-4">
    <div class="row pt-md-5">
        <div class="col-md-7 shadow-sm border-0 card p-5 offset-md-0">
            @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if($report->isResolved() || $report->isDeclined())
                    <h2>{{$report->id}}. azonosítójú probléma</h2>
                    @else
                    <h2>{{$report->id}}. azonosítójú probléma szerkesztése</h2>
                    <small>Probléma bejelentése: {{$report->created_at}}</small>
                    <br>
                    <small>Ha úgy látod, módosítanod kell a bejelntéseden, itt megteheted!</small>
                    @endif
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-12">
                    <form class="form" action="{{ route('reports.update', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-12 col-md-12">
                                <label for="title"><b>Probléma megnevezése röviden *</b></label>
                                <input 
                                    @if($report->isResolved() || $report->isDeclined())
                                    disabled
                                    @endif
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    id="title"
                                    value="{{$report->title}}"
                                    placeholder="Probléma"
                                    title="Probléma">

                                @error('first_name')
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
                                    @if($report->isResolved() || $report->isDeclined())
                                    disabled
                                    @endif
                                    style="height: auto!important" 
                                    name="text" 
                                    rows="5" 
                                    class="form-control" 
                                    id="content">{!!$report->text!!}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        @if($report->isResolved() || $report->isDeclined())
                            <div class="mt-2">
                                <b class="text-dark">A probléma állapota: 
                                    {!!$report->getStatusTemplated()!!}
                                </b>
                            </div>
                        @else
                        <div class="d-flex align-items-center justify-content-evenly form-group mt-2">
                            <div class="col-xs-12 text-center ">
                                <br>
                                <button class="btn btn-dark" type="submit">Mentés</button>
                            </div>
                        </div>
                        @endif
                    </form>

                    <form action="{{route('reports.destroy', $report->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="mt-4 col-xs-12 text-center">
                            <button class="btn btn-danger" type="submit">Törlés</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12 ml-md-2 shadow-sm border-0 card p-5 offset-md-1">
            @if($report->response)
                <h2>Válaszüzenet:</h2>
                <hr>
                <p class="mb-0"><i>"{{$report->response->text}}"</i></p>
                <hr>
                <small>Választ kapott ekkor: <span class="badge bg-primary">{{$report->response->getSubmittedDate()}}</span></small>
            @else
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_wnqlfojb.json" background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>
                <p class="text-center mt-4"><b>Nem érkezett még válasz, nézz vissza később</b></p>
            @endif
        </div>
    </div>
</section>
@endsection