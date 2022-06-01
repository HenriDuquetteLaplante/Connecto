@extends('layouts.app_signal')

@section('title', 'Signalement')

@section('content')
    <div class="card1 card m-2 border">
        <div class="container row center">
            <div class="text-center">
                <h2 class="m-3"><strong>Un problème?</strong></h2>
            </div>

            <form method="POST" action="{{route('signal.store')}}">
            @csrf

                <div class="form-group m-2">
                    <label for="composante"><strong>Composante(s) : </strong></label>
                    <select class="boite form-select form-control" name="component_id" id="choixComposante">
                        @foreach ($components as $component)
                            <option value="{{$component->id}}">{{$component->name}}</option>
                        @endforeach 
                    </select>

                    @error ('component_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group m-2">
                    <label for="problem"><strong>Problème : </strong></label>
                    
                        @foreach ($problems as $problem)
                            <div class="col m-1">
                                <input type="radio" id="{{$problem->id}}" name="problem_id" value="{{$problem->id}}">
                                <label for="{{$problem->id}}">{{$problem->type}}</label>
                            </div>
                        @endforeach
               
                    @error ('problem_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label for="detail"><strong>Détails :</strong></label>
                    <textarea id="story" class="boite shadow-textarea form-control w-100" name="description" 
                        placeholder="Inscrivez les détails du problème"></textarea>

                    @error ("description")
                        <div class="error">{{ $message}}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-center">
                    <input type="submit" class="signal btn btn-outline-dark btn-lg m-2 border-dark border" value="Signaler">
                </div>
            </form>
        </div>
    </div>

    <div>
        <a href="{{route('index')}}" class="retour btn border-dark border">Retour</a>
    </div>

@endsection