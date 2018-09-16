<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //
    protected $table="location";
    

    public function plate(){
        return $this->belongsTo("App\Plate","plate_id","id");
    }
}
