<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'number', 'address',
  ];

  public function school()
  {
    return $this->belongsTo('App\School');
  }
}
