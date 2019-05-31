<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'code', 'section_id',
  ];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }

  public function municipalities()
  {
    return $this->hasMany('App\Municipality');
  }

}
