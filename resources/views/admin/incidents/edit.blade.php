@extends('layouts.admin.app')

@section('title', 'Incidents')

@section('content')
    <div class="row">
        <h5><strong>Modification d'un incident</strong></h5>
        <span class="red_text">* Les composantes en rouge sont déjà signalés dans un autre incident et par conséquent ne doit pas se retrouver dans un autre incident</span>

    <hr style="width: 65%; color: #00F0FF;">

        <form class="col-6" method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
        
            <div class="mb-2">
                <label for="component" class="form-label">Composante(s) affectée(s)</label> <br />
                <div class="d-flex flex-wrap" style="font-size: 14px;">
                    @foreach($components as $component)
                    <div class="col-6">
                        <input type="checkbox" style="font-size: 12px;" id="{{ $component->id }}" value="{{$component->id}}" name="components[]" class="@error('components') is-invalid @enderror" 
                        @if(in_array($component->id, $selectedIncidents)) checked @else disabled @endif>
                        <span for="{{ $component->name }}" @if($component->hasOpenedIncident()) style="color: red;" @endif>{{ $component->name }}</span><br />
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
                        <option value="{{ $state->id }}" data-color="{{ $state->color }}" class="@error('state') is-invalid @enderror" @if($state->id === $incident->components()->first()->state_id) selected @else disabled @endif>{{ $state->name }}</option> 
                    @endforeach

                    @error('state')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </select>

                <span class="red_text">* Veuillez fermer l'incident en cours pour pouvoir modifier l'état de la ou des composantes</span>
            </div>

            <div class="mb-2">
                <label for="status" class="form-label">Statut de l'incident</label>
                <select id="status" name="status" type="text" class="form-select">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" class="@error('status') is-invalid @enderror" @if($status->id === $incident->status->id) selected @endif>{{ $status->status }}</option>
                    @endforeach

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </select>
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Message de l'incident</label>
                <textarea id="description" name="description" class="form-control" class="@error('description') is-invalid @enderror">{{ $incident->description }}</textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Modifier" class="btn btn-primary" />
        </form>

        <div class="col-4 d-flex flex-column align-items-center">
                <div id="cercle_state" class="rounded-circle" style="background-color: {{ $incident->components()->first()->state->color }};"></div> 
                <p style="padding: 10px; font-size: 15px;">État actuel de la composante</p>
        </div>
    </div>
@endsection