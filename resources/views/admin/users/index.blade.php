@extends('layouts.admin.app')

@section('title', 'Utilisateurs')

@section('content')


<div class="row">
    <h5><strong>Inscription d’un nouveau gestionnaire</strong></h5>

    <hr style="width: 65%; color: #00F0FF;">

    <form method="POST" action="{{ ($edit == true) ? route('admin.users.update', ['user' => $id]) : route('admin.users.store') }}" class="col-6">
        @csrf

        <div class="mb-2">
            <label for="email" class="form-label">Courriel</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Entrer un courriel">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        
        <div class="mb-2">
            <div class="tooltipPwd">
                <label  @if ($edit)
                            data-toggle="collapse" data-target="#password" id="collapsePwd"
                        @endif
                        for="password">Mot de passe
                </label>
                @if ($edit) <span class="tooltiptext">Changer</span> @endif
            </div>
            <input  id="password" name="password" type="password" value="{{ old('password', $user->password) }}"
                    class="@if($edit) collapse @endif form-control
                    @error('password') is-invalid @enderror"
                    placeholder="Entrer le mot de passe"
            >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="first_name" class="form-label">Prénom de l'employé(e)</label>
            <input id="first_name" name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Entrer un prénom">

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="mb-2">
            <label for="last_name" class="form-label">Nom de l'employé(e)</label>
            <input id="last_name" name="last_name" type="text" value="{{ old('last_name', $user->last_name) }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Entrer un nom">

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
        @if ($edit) <a type="reset" class="btn btn-outline-secondary" href="{{route('admin.users.index')}}">Annuler</a> @endif
    </form>

    <div class="col-4 d-flex flex-column align-items-center">
        <div class="rounded-circle photoCircle">
            <div class="row">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative; top: 25px;">
                    <path d="M18.75 87.5C18.75 87.5 12.5 87.5 12.5 81.25C12.5 75 18.75 56.25 50 56.25C81.25 56.25 87.5 75 87.5 81.25C87.5 87.5 81.25 87.5 81.25 87.5H18.75ZM50 50C54.9728 50 59.7419 48.0246 63.2583 44.5083C66.7746 40.9919 68.75 36.2228 68.75 31.25C68.75 26.2772 66.7746 21.5081 63.2583 17.9917C59.7419 14.4754 54.9728 12.5 50 12.5C45.0272 12.5 40.2581 14.4754 36.7417 17.9917C33.2254 21.5081 31.25 26.2772 31.25 31.25C31.25 36.2228 33.2254 40.9919 36.7417 44.5083C40.2581 48.0246 45.0272 50 50 50V50Z" fill="black"/>
                </svg>
            </div>
        </div>
        <p style="padding: 10px; font-size: 15px;">Photo de l’employé</p>
    </div>

    <div class="col-5 mb-2">
        @if (session('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="row">
        <h5><strong>Comptes clients récemment créés</strong></h5>

        <table class="col-12" style="margin: 0 0 20px 12px;">
            <thead>
                <tr style="display: flex;">
                    <th class="flex25">Nom de l’employé</th>
                    <th class="flex25">Courriel</th>
                    <th class="flex25">Actif</th>
                    <th class="flex25">Editer</th>
                </tr>
            </thead>
        </table>

        <div class="box-scroll-div">
            @foreach($users as $current_user) 
                <div id="accordion">
                    <div class="card">
                        <div class="card-header row" id="headingOne" style="margin: 0;">
                            <div class="flex25">{{ $current_user->first_name .' ' . $current_user->last_name }}</div>
                            <div class="flex25">{{ $current_user->email }}</div>
                            <div class="flex25">
                                <div class="form-check form-switch">
                                    <form method='POST' action="{{ route('admin.users.UpdateState', ['user' => $current_user->id]) }}">
                                        @csrf
                                        <input  class="form-check-input" type="checkbox" id="isActive" name="isActive"
                                                {{ $current_user->is_active == 1 ? 'checked' : '' }}
                                                onchange="this.form.submit();"
                                                {{ $current_user->email == auth()->user()->email ? 'disabled' : '' }}
                                        >
                                    </form>
                                </div>
                            </div>
                            <div class="flex25"><a class="btn btn-outline-secondary modif" href="{{ route('admin.users.edit', ['user' => $current_user]) }}">&#x270e</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div>  
@endsection