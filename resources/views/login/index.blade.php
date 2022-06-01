@extends('layouts.login.app')

@section('title', 'Login')

@section('content')

<div class="corps text-center col-md-5 mx-auto">

    <h1 class="h3 mb-3 fw-normal">Authentifiez-vous</h1>

    <div class="form-signin">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('authenticate') }}">
            @csrf

            <div class="form-floating">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="emailSignin" placeholder="nom@example.com">
                <label for="emailInput">Courriel</label>
            </div>
            <br/>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="passwordSignin" placeholder="Mot de passe">
                <label for="passwordSignin">Mot de passe</label>
            </div>
            <br/>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
        </form>
    </div>

</div>
@endsection