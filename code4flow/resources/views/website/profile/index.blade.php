@extends('layouts.website.app')

@section('content')

<div class="row p-md-5 mt-md-5">
    <div class="col-md-8 col-12 shadow-sm border-0 card p-5 offset-md-2">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h1>{{Auth::user()->first_name}} {{Auth::user()->second_name}}</h1>
            </div>
            <div class="col-12">
                <a href="/users">
                    <a href="{{route('landing')}}" class="navbar-brand text-black">
                        <i class="fa fa-book"></i>
                        Költők<b>klubbja tag már <span class="bg-black p-2 px-3 badge badge-light">{{$user->created_at->diffForHumans()}}</span></b>
                    </a>
                </a>
                <br>
                <p class="mt-2">Utolsó módosítás dátuma: {{$user->updated_at}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="text-center">
                    <img 
                        class="rounded-circle mb-2"
                        src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png"
                        alt="avatar">
                </div>
            </div>

            <div class="col-12">
                <form class="form" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="row">

                        <h4>Személyes</h4>

                        <div class="col-6">
                            <label for="first_name"><b>Keresztnév *</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('first_name') is-invalid @enderror" 
                                name="first_name" 
                                id="first_name"
                                placeholder="Add meg a keresztnevedet" 
                                value="{{$user->first_name}}"
                                title="Keresztneve">

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="second_name"><b>Vezetéknév *</b></label>
                        <input  
                            type="text" 
                            class="form-control @error('second_name') is-invalid @enderror" 
                            name="second_name" 
                            id="second_name"
                            placeholder="Add meg a vezetékneved is!" 
                            value="{{$user->second_name}}"
                            title="Add meg a vezetékneved is!">

                            @error('second_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-6 mt-2">
                            <label for="title"><b>Titulus</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" 
                                id="title"
                                placeholder="Add meg a képzeletbeli titulosodat" 
                                value="{{$user->title}}"
                                title="Titulus">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-6 mt-2">
                            <label for="education"><b>Tanulmányok</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('education') is-invalid @enderror" 
                                name="education" 
                                id="education"
                                placeholder="Merre jártál iskolába?" 
                                value="{{$user->education}}"
                                title="Merre jártál iskolába?">

                            @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12 mt-2">
                            <label for="note"><b>Pár szó rólad és munkásságádoról</b></label>
                            <textarea 
                                style="height: auto!important"
                                type="text" 
                                class="form-control @error('note') is-invalid @enderror" 
                                name="note" 
                                id="note"
                                rows="3"
                                title="Note">
                                {{$user->note}}
                            </textarea>

                            @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-2">

                        <h4>Lakhely</h4>

                        <div class="col-4">
                            <label for="city"><b>Város *</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                name="city" 
                                id="city"
                                placeholder="Add meg a városodat" 
                                value="{{$user->city}}" title="Add meg a városodat">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="col-4">
                            <label for="county"><b>Megye *</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                name="county" 
                                id="county"
                                placeholder="Add meg a megyédet" 
                                value="{{$user->county}}" 
                                title="Add meg a megyédet">

                            @error('county')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="zip"><b>Irányítószám *</b></label>
                            <input 
                                type="text" 
                                class="form-control @error('zip') is-invalid @enderror" 
                                name="zip" 
                                id="zip"
                                placeholder="Add meg az irányítószámodat is" 
                                value="{{$user->zip}}"
                                title="Add meg az irányítószámodat is">

                            @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group mt-4">
                        <div class="col-xs-12 text-center ">
                            <br>
                            <button class="btn btn-dark" type="submit">Mentés</button>
                        </div>
                    </div>
                </form>

                <form action="{{route('profile.delete')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group mt-4">
                        <div class="col-xs-12 text-center ">
                            <button class="btn btn-danger" type="submit">Profil teljeskörű törlése</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection