@extends('layouts.website.app')

@section('content')
    <section class="container pt-4 mt-4">
        <div>
            <h1>Versek gyüjteménye</h1>
            <small>Itt jellennek meg a már engedélyezett költemények!</small>
        </div>

        <div class="row mt-4">
            <section class="reviews-section py-5">
                <div class="container p-0">
                    <div class="row justify-content-between">
                        @if(count($poems))
                        @foreach ($poems as $poem)
                        <div class="item col-12 pb-0 col-lg-4 p-3 mb-4">
                            <div class="item-inner position-relative  bg-white shadow-sm rounded p-4">
                                <h2 class="text-center">{{$poem->title}}</h2>
                                </blockquote>
                                <p><b>{!! $poem->text !!}</b></p>
                                <hr>
                                <small>Kategória: {{$poem->category->name}}</small>        
                                <hr>                       
                                <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
                                <div class="source justify-content-center text-center row gx-md-3 gy-3 gy-md-0 align-items-center">
                                    <div class="col-12 col-md-auto text-center text-md-start">
                                        <img class="source-profile rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png" alt="image">
                                    </div>
                                    <div class="col source-info text-center text-md-start">
                                        <div class="source-name"><a class="text-dark" href="{{route('profile.show',$poem->user->id)}}">{{$poem->user->getName()}}</a></div>
                                        <div class="soure-title">{{$poem->user->title}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach    
                        @else
                        <div class="col-md-5 col-12 m-auto">
                            <h1 class="text-center">Ez itt üresnek tűnik...</h1>
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_wnqlfojb.json"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>
                        </div>
                        @endif

                        <div class="row mt-4 d-flex text-center">
                            {{$poems->links()}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection