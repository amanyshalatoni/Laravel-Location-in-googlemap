<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price_licenses extends Model
{
    //
    protected $table="price_licenses";
    
      public function plate(){
        return $this->hasMany("App\Plate");
    }
}
