@extends('layouts.admin.app')

@section('title', 'Incidents')

@section('content')
    <div class="row">
        <h5><strong>Création d'un nouvel incident</strong></h5>

    <hr style="width: 65%; color: #00F0FF;">

        <form class="col-6" method="POST" action="{{ route('admin.incidents.store') }}">
        @csrf
        
            <div class="mb-2">
                <label for="component" class="form-label">Composante(s) affectée(s)</label> <br />
                <div class="d-flex flex-wrap" style="font-size: 14px;">
                    @foreach($components as $component)
                    <div class="col-6">
                        <input type="checkbox" style="font-size: 12px;" id="{{ $component->id }}" value="{{$component->id}}" name="components[]" class="@error('components') is-invalid @enderror" @if($component->hasOpenedIncident()) disabled @endif>
                        <span for="{{ $component->name }}">{{ $component->name }}</span><br />
                    </div>
                    @endforeach

                    @error('components')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </select>
            </div>

            <div class="mb-2">   
                <label for="state" class="form-label">État de la (des) composante(s)</label>
                <select id="state" name="state" type="text" class="form-select">
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" data-color="{{ $state->color }}" class="@error('state') is-invalid @enderror">{{ $state->name }}</option>
                    @endforeach

                    @error('state')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </select>
            </div>

            <div class="mb-2">
                <label for="status" class="form-label">Statut de l'incident</label>
                <select id="status" name="status" type="text" class="form-select">
                    @foreach($statuses as $status)
                        @if($status->status !== 'Résolu')
                        <option value="{{ $status->id }}" class="@error('status') is-invalid @enderror">{{ $status->status }}</option>
                        @endif
                    @endforeach

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </select>
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Message de l'incident</label>
                <textarea id="description" name="description" class="form-control" class="@error('description') is-invalid @enderror"></textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Créer" class="btn btn-primary" />
        </form>

        <div class="col-4 d-flex flex-column align-items-center">
                <div id="cercle_state" class="rounded-circle"></div>
                <p style="padding: 10px; font-size: 15px;">État actuel de la composante</p>
        </div>
    </div>
    <div class="row">
        <h5><strong>Incidents présentement ouvert</strong></h5>

        <table class="col-11" style="margin: 0 0 20px 12px;">
            <thead>
                <tr style="display: flex;">
                    <th class="flex12"># d'incident</th>
                    <th class="flex21">État</th>
                    <th class="flex205">Status</th>
                    <th class="flex20">Date d'ouverture</th>
                    <th class="flex20">Message de l'incident</th>
                    <th class="flex5">Modifier</th>
                </tr>
            </thead>
        </table>

        <div class="box-scroll-div">
        @foreach ($incidents as $incident)  
            <div id="accordion">
                <div class="card">
                    <div class="card-header row" id="headingOne" style="margin: 0;">
                        <div class="flex10">{{ $incident->id }}</div>
                        <div class="flex20">{{ $incident->getState() }}</div>
                        <div class="flex20">{{ $incident->status->status }}</div>
                        <div class="flex20">{{ $incident->created_at }}</div>
                        <div class="flex20">{{ $incident->description }}</div>
                        <div class="flex10">
                            <a class="btn btn-outline-secondary modif" href="{{ route('admin.incidents.edit', ['incident' => $incident]) }}">&#x270e</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div>  
@endsection