<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    //
    protected $table="plate";
    
    public function municipalitys(){
        return $this->belongsTo("App\Municipality","municipality_id","id");
    }
   public function client(){
        return $this->hasMany("App\Client");
  }
    public function pricelicenses(){
        return $this->belongsTo("App\Price_licenses");
    }
    
    public function platetypes(){
        return $this->belongsTo("App\plate_type","plate_type_id","id");
    }
  //     public function location(){
//        return $this->belongsTo("App\location");
  //  }
}
