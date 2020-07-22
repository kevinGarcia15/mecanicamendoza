<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class worksheet_db extends Model
{
    protected $guarded = [];

  public function worksheet(){
      return $this->hasOne(client_db::class);
  }
}
