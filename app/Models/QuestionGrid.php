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

	public function lesson() {
		return $this->belongsTo('App\Models\Lesson', 'lessons_id', 'id');
	}

    public function study() {
		return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
	}

    public function basic_competency() {
		return $this->belongsTo('App\Models\BasicCompetency', 'basic_competencies_id', 'id');
	}

	public function grade_specialization() {
		return $this->belongsTo('App\Models\GradeSpecialization', 'grade_specializations_id', 'id');
	}

	public function scopeWhereCardParam($query, $type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id) {
		return $query->where([
								['type', $type],
								['form', $form],
								['school_year', 'LIKE', $school_year],
								['studies_id', $studies_id],
								['grade_specializations_id', $grade_specializations_id],
								['teachers_id', $teachers_id]
							]);
	}

	public function scopeAdvancedSelect($query){
		return $query->select('form', 'teachers_id', 'studies_id', 'type', 'school_year', 'grade_specializations_id');
	}

	public function scopeAdvancedGroupBy($query){
		return $query->groupBy('teachers_id')
						->groupBy('type')
						->groupBy('form')
						->groupBy('studies_id')
						->groupBy('school_year')
						->groupBy('grade_specializations_id')
						->orderBy('sorting_number');
	}
}
