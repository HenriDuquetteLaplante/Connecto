@extends('layouts.admin.app')

@section('title', 'Historique - Incidents')
    
@section('content')
<h5><strong>Liste des incidents depuis les 30 derniers jours</strong></h5>
 <table class="table">
    <thead>
        <tr style="display: flex;">
            <th class="flex20"># d'incident</th>
            <th class="flex20">État</th>
            <th class="flex20">Date d'ouverture</th>
            <th class="flex20">Date de fermeture</th>
            <th class="flex20">Composante(s)</th>
        </tr>
    </thead>
</table>

<div class="hist-incidents-div">
@foreach ($incidents as $incident)  
    <div id="accordion">
        <div class="card">
            <div class="card-header row" id="headingOne" style="margin: 0;">
                <div class="flex20">{{ $incident->id }}</div>
                <div class="flex20">{{ $incident->state->name }}</div>
                <div class="flex20">{{ $incident->created_at }}</div>
                <div class="flex20">{{ $incident->closed_date }}</div>
                <div class="flex20">
                    <button class="btn btn-link modif" data-toggle="collapse" data-target="#collapse-component-{{ $incident->id }}" aria-expanded="true" aria-controls="collapse-component-{{ $incident->id }}">
                        Composantes
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="collapse-component-{{ $incident->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <ul>
                @foreach($incident->components as $component)
                    <li>{{$component->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach
</div>
<div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div>  
@endsection