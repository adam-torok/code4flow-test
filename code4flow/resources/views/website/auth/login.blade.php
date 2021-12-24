@extends('layouts.website.app')
@push('styles')
    <style>
        main{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;        
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3 border-0">Jelentkezz be!</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input 
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input 
                                    id="password"
                                    placeholder="Jelszó"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Bejelentkezve maradok
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-flex items-center justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Bejelentkezés
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn" href="{{ route('password.request') }}">
                                        Elfelejtetted a jelszódat?
                                    </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
