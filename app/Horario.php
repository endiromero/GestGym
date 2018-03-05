<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $guarded = ['id', 'hora', 'created_at', 'updated_at'];

    public function gimnasios(){
        return $this->belongsTo(Gimnasio::class)->latest();
    }

    public function actividades(){
        return $this->belongsToMany(Actividades::class)->latest();
    }

    public function monitores(){
        return $this->belongsToMany(Monitores::class)->latest();
    }
}
