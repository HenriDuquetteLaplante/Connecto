<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Component;
use App\Models\Incident;
use App\Models\State;;
use App\Models\Status;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index() {
        $components = Component::all();
        $states = State::all();
        $statuses = Status::all();
        $incidents = Incident::with(['components', 'components.state', 'status'])->where('closed_date', '=', null)->get();

        return view('admin.incidents.index', ['components' => $components, 'states' => $states, 'statuses' => $statuses, 'incidents' => $incidents]);
    }

    public function edit($id) {
        $components = Component::all();
        $states = State::all();
        $statuses = Status::all();
        $incident = Incident::with(['components', 'components.state', 'status'])->where('id', $id)->first();
        $selectedIncidents = $incident->components->pluck('id')->toArray(); // Retourne une collection d'id seulement en tableau

        return view('admin.incidents.edit', ['components' => $components, 'states' => $states, 'statuses' => $statuses, 'incident' => $incident, 'selectedIncidents' => $selectedIncidents]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'components' =>'required',
            'state' => 'required',
            'status' => 'required',
            'description' => 'required|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $incident = Incident::create(['status_id' => $request->get('status'),
                                          'description' => $request->description,
                                          'state_id' => $request->get('state'),]);

            $incident->components()->sync($request->components);

            foreach($incident->components as $component) {
                $component->update([
                    'state_id' => $request->get('state'),
                ]);
            }
        });

        return redirect()->route('admin.incidents.index');
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'components' =>'required',
            'state' => 'required',
            'status' => 'required',
            'description' => 'required|max:255',
        ]);

        DB::transaction(function () use ($request, $id) {
            $incident = Incident::with(['components', 'components.state', 'status'])->where('id', $id)->first();
        
            if($request->status !== '3') {

                $incident->update(['status_id' => $request->get('status'),
                                'description' => $request->description,]);
                                
                $incident->components()->sync($request->components);

                foreach($incident->components as $component) {
                    $component->update([
                        'state_id' => $request->get('state'),
                    ]);
                }
                $incident->touch(); // Met à jour le temps 'updated_at' 
            } 
            else {
                $incident->update(['closed_date' => Carbon::now(),]); // Donne une date de type "yyyy-mm-dd hh:mm:ss"

                foreach($incident->components as $component) {
                    $component->update([
                        'state_id' => 1,
                    ]);
                }
            }
        });

        return redirect()->route('admin.incidents.index');
    }
}
