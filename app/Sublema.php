<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sublema extends Model
{

    public function lema()
    {
      return $this->belongsTo('App\Lema');
    }

}
