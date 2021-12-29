@extends('layouts.website.app')

@section('content')
<div class="container pt-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3 border-0">Első lépéseid</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email cím</label>
                            <div class="col-md-6">
                                <input 
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    placeholder="Add meg email címedet"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Keresztnév</label>
                            <div class="col-md-6">
                                <input 
                                    id="name"
                                    type="text"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    autocomplete="first_name"
                                    placeholder="Add meg a keresztnevedet">

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="second_name" class="col-md-4 col-form-label text-md-right">Vezetéknév</label>
                            <div class="col-md-6">
                                <input 
                                    id="second_name"
                                    type="text"
                                    class="form-control @error('second_name') is-invalid @enderror"
                                    name="second_name" value="{{ old('second_name') }}"
                                    placeholder="Add meg vezetékneved is!"
                                    autocomplete="name">
                                @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Helység</label>
                            <div class="col-12 pb-4 pb-md-0 col-md-2">
                                <input 
                                    name="city"
                                    value="{{ old('city') }}"
                                    type="text" 
                                    class="form-control @error('city') is-invalid @enderror"
                                    placeholder="Város">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <input 
                                    name="county"
                                    value="{{ old('county') }}"
                                    type="text"
                                    class="form-control @error('county') is-invalid @enderror"
                                    placeholder="Megye">
                                @error('county')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <input 
                                    name="zip" 
                                    value="{{ old('zip') }}"
                                    type="number"
                                    class="form-control @error('zip') is-invalid @enderror"
                                    placeholder="Irányítószám">
                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Jelszó</label>
                            <div class="col-md-6">
                                <input 
                                    id="password" 
                                    type="password"
                                    class="form-control mb-2 @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Add meg a jelszódat"
                                    autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-center d-block">Lehetőleg erős jelszót válassz! 😉</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                Jelszó mégegyszer
                            </label>
                            <div class="col-md-6">
                                <input
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="Add meg mégegyszer a jelszódat!"
                                autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Regisztráció
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection