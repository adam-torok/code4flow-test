@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Felhasználó szerk. - '.$user->first_name. ' ' .$user->second_name)

@section('content_header')
<div class="row col-12">
<h1>Felhasználó: {{$user->first_name}} {{$user->second_name}}</h1>
</div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="h5 mb-0">Szerkesztés</h2>
        </div>
        <div class="card-body">

            <form method="POST" action="{{route('admin:users.update',$user)}}">
                @method('PATCH')
                @csrf
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="border-top-0">Keresztnév</td>
                        <td class="border-top-0">
                            <input 
                                class="form-control @error('first_name') is-invalid @enderror" 
                                name="first_name"
                                type="text" 
                                value="{{$user->first_name}}">

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Vezetéknév</td>
                        <td>
                            <input 
                                class="form-control @error('second_name') is-invalid @enderror"
                                name="second_name"
                                type="text" 
                                value="{{$user->second_name}}">

                                @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input 
                                class="form-control" 
                                disabled 
                                type="text" 
                                value="{{$user->email}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Email megerősítve</td>
                        <td>@if($user->email_verified_at)
                                {{ $user->email_verified_at->format('Y.m.d') }}
                            @else
                                - 
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Regisztrált</td>
                        <td>{{ $user->created_at->format('Y.m.d H:i') }}</td>
                    </tr>
                    <tr>
                        <td>Megye</td>
                        <td>
                            <input 
                                type="text" 
                                name="county" 
                                class="form-control @error('county') is-invalid @enderror" 
                                value="{{ $user->county }}">

                                @error('county')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Város</td>
                        <td>
                            <input 
                                type="text" 
                                name="city" 
                                class="form-control @error('city') is-invalid @enderror" 
                                value="{{ $user->city }}">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Irányítószám</td>
                        <td>
                            <input 
                                type="number" 
                                name="zip" 
                                class="form-control @error('zip') is-invalid @enderror" 
                                value="{{ $user->zip }}">

                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Mentés</button>
                </div>

            </form>

            <form id="delete-form" method="POST" action="{{route('admin:users.destroy', $user->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="d-flex align-items-center btn btn-sm ml-auto btn-danger">Törlés</button>
            </form>

        </div>
    </div>
@endsection


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
