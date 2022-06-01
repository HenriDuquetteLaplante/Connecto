<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
        'description',
        'closed_date',
        'state_id',
    ];

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function duree() 
    {
        return $this->created_at->diffInHours($this->closed_date);
    }
    
    public function componentState(){
        
        return $this->components->get();
    }
    public function getState() {
        if($this->components->count())
            return $this->components()->first()->state->name;
        else {
            return 'Opérationnel';
        }
    }
    public function global_uptime()
    {
        $incidents = Incident::where(function ($query) {$query->where('closed_date', '>', now()->subDays(30)->endOfDay())->orWhere('closed_date', '=', null);}) ->orderBy('created_at', 'asc')->get();// Sort tout les incidents du dernier mois dans la variable
        $intervals = [];// déclaration de variables utilisées pour la logique
        $tempsEnIncident= 0;
        $unMois = 2592000;

    
        foreach ($incidents as $incident) {//loop qui itere sur chaques incidents
            
            $created_at = strtotime($incident->created_at);//conversion de la date de creation en entier de secondes

            if (!$incident->closed_date) {// si l'incident est en cour on affecte l'entier en seconde que moment présent
                $closed_at = strtotime('now');
            } else {
                $closed_at = strtotime($incident->closed_date);
            }
            if (count($intervals) == 0) {//envoyer le premier interval de temps dans le tableau des intervals
                array_push($intervals,[$created_at, $closed_at]);
            }else{
                $lastPair = end($intervals);//On obtien la paire de temps qui compose le dernier interval du tableau des intervals
                $endOfIncident = $lastPair[1];

                if ( $created_at < $endOfIncident)// si l'incident à été créer avant la fin de l'autre il y a donc un overlap  
                {
                    if ($closed_at < $endOfIncident) {// si l'incident à été fermé avant la fin de l'autre c'est un overlap complet donc on en tien pas compte
                        continue;
                    }
                    $lastPairpos = count($intervals)-1;// On trouve la position de la dernière paire dans l'arrêt des intervals

                    $intervals[$lastPairpos][1] = $closed_at;// On remplace la valeure du closed date du premier incident par celui du deuxième
                }else {// si aucun overlap de détecté on envoie simplement l'interval de seconde dans le le tableau des intervals
                    array_push($intervals, [$created_at, $closed_at]);
                }
            }
        }
        foreach ($intervals as $interval) {// On additionne tous les interval pour nous donner un pourcentage de temps en incident
            $temps = $interval[1]-$interval[0];
            $tempsEnIncident = $tempsEnIncident + $temps;
        }

            return  round(100 - (($tempsEnIncident / $unMois) * 100));
        
    }
}

