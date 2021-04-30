<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
	  protected $table = 'studies';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'name',
        'teachers_id',
		    'grades_id',
    ];

    public function teacher() {
		return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function grade() {
		return $this->belongsTo('App\Models\Grade', 'grades_id', 'id');
	}
}
