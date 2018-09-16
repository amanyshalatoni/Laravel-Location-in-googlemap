<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    //
    protected $table="municipality";

    public function plate(){
        return $this->hasMany("App\Plate");
    }
}
