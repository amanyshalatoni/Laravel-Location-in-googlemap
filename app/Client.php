<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table="client";
    
   
    public function plate(){
        return $this->belongsTo("App\Plate");
    }
    public function municipality(){
        return $this->hasOne("App\Municipality");
    }
    
}
