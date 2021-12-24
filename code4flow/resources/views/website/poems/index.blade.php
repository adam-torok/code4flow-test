@extends('layouts.website.app')

@section('content')
    <section class="container pt-4 mt-4">
        <div class="d-flex justify-content-between">
            <h1>Saját verseid</h1>
            <a href="{{route('user-poems.create')}}" class="btn btn-dark"><i class="fas fa-pen-fancy mr-2 d-inline"></i> Vers létrehozása</a>
        </div>
        <div>
            @if(count($poems))
            <small>Amíg nincs publikálva versed, egy masnit fogsz látni rajta, amin az áll "várakozik"</small>
            <br>
            <small>Ha minden feltételnek megfelel a versed, és elfogadják akkor "elfogadva" szöveg fog zöld masnin állni</small>
            <br>
            <small>Ha elutasításra kerül versed, piros masnin "elutasítva" szöveg fog rajta szerepelni</small>
            @else
            <small>Úgy tűnik, még nem írtál egy verset sem</small>
            @endif
        </div>
        <div class="row mt-4">

            <section class="reviews-section py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        @if(count($poems))
                        @foreach ($poems as $poem)
                        <div class="item col-12 pb-0 col-lg-4 p-3 mb-4">
                            <div class="item-inner position-relative  bg-white shadow-sm rounded p-4">
                                @if ($poem->isApproved() )
                                <div class="ribbon ribbon-green ribbon-top-right"><span>elfogadva</span></div>
                                @elseif ($poem->isWaiting())
                                <div class="ribbon ribbon-yellow ribbon-top-right"><span>várakozik</span></div>
                                @else
                                <div class="ribbon ribbon-red ribbon-top-right"><span>elutasitva</span></div>
                                @endif
                                <h2 class="text-center">{{$poem->title}}</h2>
                                </blockquote>
                                <p style="overflow: hidden" class="w-100"><b>{!! Str::limit($poem->text) !!}</b></p>
                                <hr>
                                <small>Kategória: {{$poem->category->name}}</small>
                                <hr>
                                <div class="source justify-content-center text-center row gx-md-3 gy-3 gy-md-0 align-items-center">
                                    <div class="col-12 d-flex col-md-auto text-center text-md-start">
                                        <a class="btn btn-dark btn-sm shadow-sm" href="{{route('user-poems.edit',$poem->id)}}">Szerkesztés</a>
                                        <form class="d-flex" method="POST" action="{{route('user-poems.destroy',$poem)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm">Törlés</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                            </div>
                        </div>
                        @endforeach    
                        @else
                        <div class="col-md-5 col-12 m-auto">
                            <h1 class="text-center">Ez itt üresnek tűnik...</h1>
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_wnqlfojb.json"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection