@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Felhasználó - '.$user->first_name. ' ' .$user->second_name)

@section('content_header')
<div class="col-12 row">
    <h1>{{$user->getName()}} összegzése</h1>
    <a class="btn btn-primary ml-auto" href="{{route('admin:users.edit', $user)}}">Felhasználó szerkesztése</a>
</div>
@stop

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{$user->first_name}} {{$user->second_name}}</h3>
                        <p class="text-muted text-center">Tag {{$user->getRegistrationDate()}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Versek száma</b> <a class="float-right">{{count($user->poems)}}</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-danger btn-block"><b>Fiók felfüggesztése</b></a>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Leírások</h3>
                    </div>
                    <div class="card-body">
                        
                            <strong><i class="fas fa-book mr-1"></i> Tanulmányok</strong>
                            <p class="text-muted">
                                @if($user->education)
                                    {{$user->education}}
                                @else 
                                    - Nincs adat
                                @endif
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Leírás</strong>
                            <p class="text-muted"> 
                                @if($user->note)
                                    {{$user->note}}
                                @else 
                                    - Nincs adat
                                @endif
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="h5 mb-0">Összesítés</h2>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="border-top-0">Név</td>
                                    <td class="border-top-0">{{$user->first_name}} {{$user->second_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Email megerősítve</td>
                                    <td>@if($user->email_verified_at)
                                            {{ $user->getVerificationDate() }}
                                        @else
                                            - 
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>Regisztrált</td>
                                    <td>{{ $user->created_at->format('Y.m.d H:i') }}</td>
                                </tr>
                                <tr>
                                    <td>Tanulmányok</td>
                                    <td>@if($user->education) 
                                            {{ $user->udecation }}
                                        @else
                                            - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Titulus</td>
                                    <td>@if($user->title) 
                                            {{ $user->title }}
                                        @else
                                            - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bemutatkozószöveg</td>
                                    <td>@if($user->note) 
                                            {{ $user->note }}
                                        @else
                                            - 
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Megye</td>
                                    <td>{{ $user->county }}</td>
                                </tr>
                                <tr>
                                    <td>Város</td>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <td>Irányítószám</td>
                                    <td>{{ $user->zip }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h1 class="h5 mt-4">Versek</h1>
                        @if(count($user->poems) > 0)
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Típus</th>
                                    <th>Cím</th>
                                    <th>Létrehozás dátuma</th>
                                    <th>Státusz</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->poems as $poem)
                                <tr>
                                    <td>{{$poem->title}}</td>
                                    <td>{{$poem->category->name}}</td>
                                    <td>{{$poem->created_at}}</td>
                                    <td>
                                        {!! $poem->getStatusTemplated() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h4 class="text-center">Még nincsenek versei a felhasználónak</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('js')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endpush