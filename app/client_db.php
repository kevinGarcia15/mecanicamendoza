<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_db extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'client_id';

    public function scopeClientName($query, $clientName){
      if ($clientName) {
        return $query->where('first_name', 'LIKE', "%$clientName%");
      }
    }
}
