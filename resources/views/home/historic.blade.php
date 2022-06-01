@extends('layouts.app_historic')

@section('title', 'Historique')

@section('content')

    <div>
        <div>
            <h2 class="text-center"><strong>Historique des incidents</strong></h2>
        </div>
        <div class="form-group">
            <form method="get">
                <div class='input-group date' id='CalendarDateTime'>
                    <input type='text' name="selectedDate" class="form-control"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <div class="mt-2">
                    <input type="submit" value="Cliquer pour valider la date">
                </div>
            </form>
        </div>
        @if(count($incidents)==0)
            <div class="card-body border border-dark shadow bg-white rounded d-flex justify-content-center">
                <p class="marginBotP">Aucune donnée n'est disponnible pour cette journée</p>
            </div>
        @else
            @foreach ($incidents as $incident)
            @if(count($incidents)>2)
            <div class="heightDiv hidden"></div>
            @endif
            <div class="historique card mt-4 border-dark shadow p-3 mb-5 bg-white">
                <div class="card-body">
                        <h3 class=card-title><strong>Incident {{$incident->id}}</strong></h3>
                        <hr class="ligne">
                        <div>
                            <h4> Composante(s) : </h4>
                            <ul>
                                @foreach($IncidentActif as $incidentte)
                                    @foreach($incidentte as $nom)
                                        @if($nom->incident_id == $incident->id)
                                        <li>{{$nom->name}}</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h4> Durée : </h4>
                            <p>{{$incident->duree()}} h</p>
                        </div>
                        <div>
                            <h4> Détails : </h4>
                            <p>{{$incident->description}}</p>
                        </div>
                    </div>
                </div>
        
            @endforeach
        
        @endif
        
        <div class="mt-4 w-100 d-flex justify-content-end" style="margin-bottom: 4px;">
            <a href="{{route('index')}}" class="retour btn border-dark border">Retour</a>
        </div>
        <div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div> 
    </div>

@endsection