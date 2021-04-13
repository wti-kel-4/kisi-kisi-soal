<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionGrid extends Model
{
    use HasFactory;
    
    public function teacher() {
		return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function study() {
		return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
	}

    public function basic_competency() {
		return $this->belongsTo('App\Models\BasicCompetency', 'basic_competencies_id', 'id');
	}
}
