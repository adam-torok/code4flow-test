@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Felhasználó - '.$user->first_name. ' ' .$user->second_name)

@section('content_header')
<div class="col-12 row">
<h1>Felhasználók kezelése</h1>
<a class="btn btn-primary ml-auto" href="{{route('admin:users.edit', $user)}}">Felhasználó szerkesztése</a>
</div>
@stop

@section('content')
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
                    <td>@if($user->email_verified_at) {{ $user->email_verified_at->format('Y.m.d') }} @else - @endif</td>
                </tr>
                <tr>
                    <td>Regisztrált</td>
                    <td>{{ $user->created_at->format('Y.m.d H:i') }}</td>
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
                            @if($poem->status === 'APPROVED')
                                <span class="right badge badge-success">Engedélyezve</span>
                            @elseif($poem->status === 'WAITING')
                            <span class="right badge badge-warning">Várakozik</span>
                            @else
                            <span class="right badge badge-danger">Elutasítva</span>
                            @endif
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
@endsection


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endpush
