<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
  public function circuit()
  {
    return $this->belongsTo('App\Circuit');
  }

  public function users()
  {
    return $this->hasMany('App\User');
  }

}
