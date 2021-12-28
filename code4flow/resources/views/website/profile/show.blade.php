@extends('layouts.website.app')

@section('content')
<div class="row p-md-5 mt-md-5">
    <div class="col-md-8 col-12 shadow-sm border-0 card p-5 offset-md-2">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h1>{{$user->first_name}} {{$user->second_name}}</h1>
            </div>
            <div class="col-12">
                <a href="/users">
                    <a href="{{route('landing')}}" class="navbar-brand text-black">
                        <i class="fa fa-book"></i>
                        Költők<b>klubbja tag már <span
                                class="bg-black p-2 px-3 badge badge-light">{{$user->created_at->diffForHumans()}}</span></b>
                    </a>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="text-center">
                    <img class="rounded-circle mb-2" src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png"
                        alt="avatar">
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <h4>Személyes</h4>
                    <div class="col-6">
                        <label for="first_name"><b>Keresztnév *</b></label>
                        <input type="text" class="form-control disabled" disabled value="{{$user->first_name}}">
                    </div>

                    <div class="col-6">
                        <label for="second_name"><b>Vezetéknév *</b></label>
                        <input type="text" class="form-control disabled" disabled value="{{$user->second_name}}">
                    </div>

                    <div class="col-6 mt-2">
                        <label for="title"><b>Titulus</b></label>
                        <input 
                            type="text" 
                            disabled
                            class="form-control" 
                            value="{{$user->title}}">
                    </div>

                    <div class="col-6 mt-2">
                        <label for="education"><b>Tanulmányok</b></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            disabled
                            value="{{$user->education}}">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="note"><b>Pár szó rólad és munkásságádoról</b></label>
                        <textarea 
                            style="height: auto!important"
                            disabled
                            class="form-control" 
                            rows="3">{{$user->note}}</textarea>
                    </div>
                </div>

                <hr>

                <div class="row mt-2">
                    <h4>Lakhely</h4>

                    <div class="col-4">
                        <label for="city"><b>Város *</b></label>
                        <input type="text" class="form-control disabled" disabled value="{{$user->city}}">
                    </div>

                    <div class="col-4">
                        <label for="county"><b>Megye *</b></label>
                        <input type="text" disabled class="form-control disabled" value="{{$user->county}}">
                    </div>

                    <div class="col-4">
                        <label for="zip"><b>Irányítószám *</b></label>
                        <input type="text" disabled class="form-control disabled" value="{{$user->zip}}">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-between">

        <div class="col-12 my-4">
            <h1 class="text-center">{{$user->first_name}} {{$user->second_name}} versei</h1>
        </div>

        @if(count($user->poems))
        @foreach ($user->poems as $poem)
        <div class="item col-12 pb-0 col-lg-4 p-3 mb-4">
            <div class="item-inner position-relative  bg-white shadow-sm rounded p-4">
                <h2 class="text-center">{{$poem->title}}</h2>
                </blockquote>
                <p><b>{!! $poem->text !!}</b></p>
                <hr>
                <small>Kategória: {{$poem->category->name}}</small>
                <hr>
                <div class="source justify-content-center text-center row gx-md-3 gy-3 gy-md-0 align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img style="width: 40px" class="source-profile rounded-circle"
                            src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png" alt="image">
                    </div>
                    <div class="col source-info text-center text-md-start">
                        <div class="source-name"><a class="text-dark"
                                href="{{route('profile.show',$poem->user->id)}}">{{$poem->user->getName()}}</a></div>
                        <div class="soure-title">Könyv kritikus</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-5 col-12 m-auto">
            <h1 class="text-center">Ez itt üresnek tűnik...</h1>
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_wnqlfojb.json" background="transparent"
                speed="1" style="width: 100%; height: auto;" loop autoplay></lottie-player>
        </div>
        @endif
    </div>
</div>
@endsection