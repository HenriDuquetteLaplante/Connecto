@extends('layouts.admin.app')

@section('title', 'Historique')

@section('content')
<div class="titres">
    <h6><strong>Signalisations</strong></h6>
    <table class="table">
        <thead>
            <tr style="display: flex;">
                <th class="flex25">Composante</th>
                <th class="flex25">Type d'erreur</th>
                <th class="flex25">Description</th>
                <th class="flex25">Date</th>
            </tr>
        </thead>
    </table>
        
    <div class="dashboard-services-div">
        @foreach ($reports as $report)  
            <div id="accordion">
                <div class="card">
                    <div class="card-header row" id="headingOne" style="margin: 0;">
                        <div class="flex25">{{ $report->name }}</div>
                        <div class="flex25">{{ $report->type }}</div>
                        <div class="flex25">{{ $report->description }}</div>
                        <div class="flex25">{{ $report->created_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach   
    </div>
</div>
<div>
    <h6><strong>Incidents</strong></h6>
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

    <div class="dashboard-services-div">
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
</div>
<div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div> 
@endsection