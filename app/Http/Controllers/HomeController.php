<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Incident;
use App\Models\State;
use App\Models\Problem;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSignalRequest;
use App\Models\Report;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index() {
        
        
        $incidents = DB::table('incidents')
                    ->select('components.name', 'incidents.id', 'incidents.created_at','incidents.closed_date', )
                    ->leftjoin('component_incident', 'incidents.id', '=', 'component_incident.incident_id' )
                    ->leftJoin('components', 'components.id', '=', 'component_incident.component_id')
                    ->where('incidents.closed_date', '>', now()->subDays(30))
                    ->orWhere('incidents.closed_date', '=', null)
                    ->get();

      

        
        $higherIncident = Incident::with(['state'])->orderBy('state_id','desc')->whereNull('closed_date')->first();
        
        $components = Component::with(['state','incidents','incidents.status','incidents.state'])->get();

       
        $couleurIncident = Incident::with(['components','state'])->select(DB::raw('DATE(incidents.created_at) AS date_creation'),'incidents.*',DB::raw('DATE(incidents.closed_date) AS closer'))->orderBy('date_creation')->get();

        $oppState = Component::with(['state'])->orderBy('state_id','desc')->first();
        
        $higherState = Incident::with(['components','components.state'])->whereNull('closed_date')->get();
        
        $incident = Incident::first();

        return view('home.index',['components'=>$components,'higherIncident'=>$higherIncident,'incidents'=>$incidents,'oppState'=>$oppState,'higherState'=>$higherState,'couleurIncident'=>$couleurIncident,'incident'=>$incident]);

    }


    Public function historic(Request $request){
        $components = Component::all();
       
        $selectedDate = now();      

        if($request->has('selectedDate')) {
            
            $selectedDate = Carbon::parse($request->query('selectedDate'));
            
            
        } 

        $incidents = Incident::whereDate('created_at',$selectedDate)->orderBy('created_at','Desc')->get();    

        $IncidentActif = DB::table('incidents')
            ->join('statuses','incidents.status_id','=','statuses.id')
            ->join('component_incident', 'incidents.id','=','component_incident.incident_id')
            ->join('components','component_incident.component_id','=','components.id')
            ->select('incidents.*','components.name','component_incident.*')
            ->get()
            ->groupBy('incident_id');

        return view('home.historic',['components'=>$components, 'IncidentActif'=>$IncidentActif, 'incidents'=>$incidents, 'selectedDate'=>$selectedDate]);
 
    }


   public function signal(){
        $components = Component::all();
        $problems = Problem::all();
        return view('home.signal',['components'=>$components,'problems'=>$problems],);
    }

    public function store(StoreSignalRequest $request)
    {
        $reports = Report::create($request->validated());

        return redirect()->route('index')->with('success', 'Le problème a bien été signalé!');

    }
}
