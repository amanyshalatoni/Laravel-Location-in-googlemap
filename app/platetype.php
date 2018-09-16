<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class platetype extends Model
{
      protected $table='plate_type';

      public function plates()
      {
          return $this->hasMany("App\Plate");
      }
}
