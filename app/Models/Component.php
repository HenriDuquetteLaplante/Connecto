<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_id',
        'state_id',
        'created_at',
        'updated_at',
    ];


    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function incidents()
    {
        return $this->belongsToMany(Incident::class);
    }
    public function incident()
    {
        return $this->incidents->first();
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function uptime()
    {
        $unMois = 2592000;
        $tempsIncident = 0;
        $now = strtotime('now');
        $monthAgo = strtotime('-30 days');
        

        foreach ($this->incidents as $incident) {
            $start = null;
            $finish = null;
            if (strtotime($incident->created_at) < $monthAgo) {
                $start = $monthAgo;
            } else {
                $start = strtotime($incident->created_at);
            }
            if ($incident->closed_date == null) {
                $finish = $now;
            } else {
                $finish = strtotime($incident->closed_date);
            }
            if ($start < $finish) {
                $tempsIncident = $tempsIncident + ($finish - $start);
            }
        }
        
            $composanteIncident = 100 - (($tempsIncident / $unMois) * 100);
        
        if (round($composanteIncident) < 0) {
            return '0%';
        } else {
            return round($composanteIncident) . '%';
        }
    }
    public function hasOpenedIncident() {
        return $this->incidents->where('closed_date', '=', null)->count() > 0;
    }
    public function incidentOpen(){
        return $this->incidents->whereNull('closed_date')->first();
    }

    public function couleur($component_id, $couleurIncident){
        
        $composantActif = ($component_id);
        $end = strtotime('now');
        $start = strtotime('-29 days', $end);
        $couleur = '#45e92b';
        $isOn = false ;
        
                                
                            

        while($start<=$end){
            $foundIncident = false;
            $isClosed = false;
                                    
            foreach($couleurIncident as $incidentKey){
                if(($incidentKey->date_creation == date('Y-m-d',$start))){
                    $foundIncident = true;
                    $isOn = true;
                    foreach($incidentKey->components as $componentDeIncident){
                        
                        if($componentDeIncident->id == $composantActif){
                            $couleur = $incidentKey->state->color;
                        }
                        
                    }
                }

                elseif($foundIncident == false && $isOn == false && $isClosed == false){
                        $foundIncident = true;
                        $couleur = '#45E92B';
                }
                    
                if($incidentKey->closer == date('Y-m-d', $start)){
                        $isOn = false;
                        $isClosed = true;
                        
                }                                         
                
            }
            
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="'.$couleur.'" class="bi bi-square-fill w-100" viewBox="0 0 20 20">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                    </svg>';
            $start = strtotime('+1 day',$start);
        }
    }

    
}



