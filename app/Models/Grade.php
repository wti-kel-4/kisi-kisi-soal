<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function teacher() {
		return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function grade_specialization() {
		return $this->belongsTo('App\Models\GradeSpecialization', 'grade_specializations_id', 'id');
	}
}
