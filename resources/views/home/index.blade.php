@extends('layouts.app')

@section('title', 'Service')

@section('content')
    <div class="container row center d-flex justify-content-center">
        <a class="retour btn border border-dark text-center" href="{{route('historic')}}">Historique des incident</a>

            {{-- <div class="card m-2"> --}}
            @if ($oppState->state->name == 'Opérationnel')

                <div class="m-2">
                    <div class="card3 card-body row" style="background-color:{{$oppState->state->color}}" >
                        <p class="card-title text-center" style="text-decoration : underline;">État Général du système</p>
                        <p class="text-center" >{{$oppState->state->name}}</p>
                        @php
                            if (isset($incident)) {
                                echo '<p class="text-center">'.$incident->global_uptime() . '% </p>';
                            }else {
                                echo '<p class="text-center">100%</p>';
                            }
                        @endphp
                    </div>
                </div>
            
            @else
                <div class="m-2 position-relative">
                   
                    
                    <div class="card3 card-body row position-relative" style="background-color:{{$higherIncident->state->color}}" >
                        <p class="card-title text-center" style="text-decoration : underline;">État Général du système</p>
                        <p class="text-center" >{{$higherIncident->state->name}}</p>

                        @php
                            if (isset($incident)) {
                                echo '<p class="text-center ">'.$incident->global_uptime() . '% </p>';
                            }else {
                                echo '<p class="text-center">100%</p>';
                            }
                        @endphp
                    </div>
                     <div class="ticoin">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle  " viewBox="0 0 16 16" id="etat_general">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    </div>
                    
                </div>
            
            
            @endif
            <div class="card3 card hidden" id="etat_gen_div">
                <div class=" card-body">
                    @foreach ($higherState as $incident)
                        @if($incident->id == $higherIncident->id)
                        <p> Componsante(s) affectée(s) :</p>
                        <ul>
                        
                            @foreach ($incident->components as $component)
                                <li>{{$component->name}}</li>
                            @endforeach
                        
                        
                        </ul>
                        <p> Détails : {{$incident->description}}</p> 
                        @endif      
                    @endforeach
               </div>
            </div>
           
            @foreach($components as $component)
                <div class="row col-lg-6 justify-content-lg-center position-relative" style="margin:0px; padding:5px;">
                    <div class="card2 card " style="margin-top:4px; margin-bottom:10px;" id={{$component->id}}>
                        <div class="card-body row">
                            
                                <h5 class="card-title text-left align-self-start">{{$component->name}}</h5>
                                @if($component->state->name != 'Opérationnel')
                                    
                                    <div class="ticoin">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle ticoin" viewBox="0 0 16 16" id='hidden_{{$component->id}}'>
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" id='pathUn_{{$component->id}}'/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" id='pathDeux_{{$component->id}}'/>
                                        </svg>
                                    </div>
                                
                                @endif
                       
            
                            <p style="color: {{$component->state->color}}">{{$component->state->name}}</p>
                            <div class="container column d-flex justify-content-center">
                                    {{$component->couleur($component->id, $couleurIncident)}}
            
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <strong>{{ $component->uptime() }}</strong>
                        </div>
                    </div>
                    <div class="card2 hidden toggle card mt-0 incident_box" id="box-{{$component->id}}">
                        @foreach ($component->incidents->whereNull('closed_date') as $incidentInfos )
                                <p>Status : {{$incidentInfos->status->status}}</p>
                                <p>Détail : {{$incidentInfos->description}}</p>
            
                        @endforeach
                    </div>
                </div>
            @endforeach

        <div class="d-flex justify-content-center fit">
            <a href="{{ route('signal')}}" class=" signaler btn btn-danger w-100" style="margin-top:5px; margin-bottom:5px;">Signaler un problème</a>
        </div>
    </div>
@endsection
