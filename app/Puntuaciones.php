<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuaciones extends Model
{
    //Con $guarded se indican los elementos que no queremos que se modifiquen
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function monitores(){
        return $this->belongsTo(Monitores::class)->latest();
    }
}
