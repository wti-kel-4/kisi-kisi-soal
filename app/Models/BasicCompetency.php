<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicCompetency extends Model
{
    use HasFactory;

    public function study() {
		  return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
	  }
}
