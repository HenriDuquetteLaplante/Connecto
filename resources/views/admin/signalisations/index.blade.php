@extends('layouts.admin.app')

@section('title', 'Historique - Signalisations')

@section('content')
<h5><strong>Liste des signalisations depuis les 30 derniers jours</strong></h5>
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

<div class="hist-incidents-div">   
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

<div style="margin-bottom: 50px;"><!--Pour laisser une espace au bas de la page--></div>   
@endsection