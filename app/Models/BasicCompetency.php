<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicCompetency extends Model
{
    protected $table = 'basic_competencies';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'name',
        'studies_id',
    ];

    public function study() {
		  return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
	  }
}
