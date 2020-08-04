<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_db extends Model
{
  protected $guarded = [];
  protected $primaryKey = 'vehicle_id';

  public function scopePlateNumber($query, $plateNumber){
    if ($plateNumber) {
      return $query->where('plateNumber', 'LIKE', "%$plateNumber%");
    }
  }
}
