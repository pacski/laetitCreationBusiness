@extends('layouts.app')

@section('content')
<div class="col-md-3 mx-auto border rounded connexion-container">
    <h1 class="text-center">Connexion</h1>
    <br>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="col-md-12">
            <input placeholder="Email..." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <div class="col-md-12">
            <input placeholder="Mot de passe..." id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <div class="form-group justify-content-center">
            <div class="d-flex flex-column">
                <button type="submit" class="btn btn-info col-md-12">
                    Connexion
                </button>
                @if (Route::has('password.request'))
                <a class="btn btn-link text-muted" href="{{ route('password.request') }}">
                   Mot de passe oublié ?
                </a>
            </div>
           
        @endif
        </div>
    </form>
   
</div>
@endsection
