<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;


    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
    public function componentPerState($id)
    {
        $nbComponent = Component::whereHas('state', function ($q) use ($id) {
            $q->where('id', $id);
        })->count();

        return $nbComponent;
    }
}
