<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class balanceCustumer_db extends Model
{
  protected $guarded = [];
  protected $primaryKey = 'balance_custumer_id';
  const CREATED_AT = 'balanceCreated_at';

}
