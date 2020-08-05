<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class worksheet_db extends Model
{
    protected $table =  'worksheet_dbs';
    protected $guarded = [];
    protected $primaryKey = 'worksheet_id';
    const UPDATED_AT = 'workSheetUpdated_at';
    const CREATED_AT = 'workSheetCreated_at';
}
