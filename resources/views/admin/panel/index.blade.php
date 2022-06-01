@extends('layouts.admin.app')

@section('title', 'Tableau de bord')

@section('content')

<div class="row" >
      
    <div class="titres col-md-8">
        <h6><strong>Signalisations</strong></h6>
        <div class="dashboard-services-div">
            @if($components)
                    @foreach ($reports as $report)
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header row" id="headingOne" style="margin: 0;">
                                <div class="flex20">{{ $report->component->name }}</div>
                                <div class="flex60">{{ $report->problem->type }}</div>    
                                <div class="flex20">
                                    <button class="btn btn-link modif" data-toggle="collapse" data-target="#collapse-report-{{ $report->id }}" aria-expanded="true" aria-controls="collapse-report-{{ $report->id }}">
                                    Description
                                    </button>
                                </div>
                          </div>

                            <div id="collapse-report-{{ $report->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                {{$report->description}}
                              </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
            @else
                <p>Aucune composante à afficher</p>
            @endif 
        </div>
    </div>
    <div class="centrer col-md-4">
        <h6><strong>État des services</strong></h6>
        <div>
            <table class="table">
                <tbody>
                    @foreach ($states as $state)
                        <tr class="couleur-etat-id-{{ $state->id }}">
                            <td><strong>{{ $state->componentPerState($state->id) }}</strong> <sub>{{ $state->name }}</sub></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="titres col-md-8">
        <h6><strong>État des services</strong></h6>
        <div class="dashboard-services-div">
            @if($components->count()>0)
                @foreach ($components as $component)
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header row" id="headingOne" style="margin: 0;">
                                <div class="flex25">{{ $component->name }}</div>
                                <div class="flex25"><strong>{{ $component->uptime() }}</strong></div>
                                <div class="flex25">État: <div class="rounded-circle cercle-{{ $component->state->color }}" alt="cercle-{{ $component->state->color }}"></div></div>
                                <div class="flex20 mail">
                                    <button class="btn btn-link modif" data-toggle="collapse" data-target="#collapse-component-{{ $component->id }}" aria-expanded="true" aria-controls="collapse-component-{{ $component->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div id="collapse-component-{{ $component->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                @if ($component->incidentOpen())
                                    <div>{{ $component->incidentOpen()->description }}</div>
                                @endif
                            </div>
                        </div>
                @endforeach
        </div>
            @else 
                <p>Aucune composante à afficher</p>
            @endif 
    </div>
        <div class="centrer col-md-4">
        <h6><strong>Top 5 des composantes signalées</strong></h6>
        <div>
            <table class="table">
                <tbody>
                    @foreach ($reportCounts as $count)
                        <tr class="couleur-top-5">
                            <td><strong>{{ $count->reports_count }}</strong> <sub>{{ $count->name }}</sub></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

