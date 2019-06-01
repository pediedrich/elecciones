<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['table_id','lema_id','sublema_id','charge_id'];

    public function lema()
    {
      return $this->belongsTo('App\Lema');
    }
    public function sublema()
    {
      return $this->belongsTo('App\Sublema');
    }
    public function table()
    {
      return $this->belongsTo('App\Table');
    }
    public function charge()
    {
      return $this->belongsTo('App\Charge');
    }

}
