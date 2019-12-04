<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disrict extends Model
{
    public function division()
    {
    	return $this->belongsTo(Division::class);
    }
}
