<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Component;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_id',
        'problem_id',
        'description',
    ];


    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
    
    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
