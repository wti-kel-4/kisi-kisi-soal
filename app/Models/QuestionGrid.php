<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGrid extends Model
{
    use HasFactory, SoftDeletes;

	protected $table = 'question_grids';
    protected $primaryKey = 'id';
    protected $fillable = [
        'teachers_id',
        'type',
        'studies_id',
        'time_allocation',
        'total',
        'school_year',
        'form',
        'basic_competencies_id',
        'grade_specializations_id',
        'indicator',
        'lessons_id',
        'sorting_number',
        'start_number',
        'end_number',
    ];

	protected static $relations_to_cascade = ['question_grid_header', 'study_lesson_scope_lesson', 'basic_competency', 'question_card', 'log_activity_user'];

	public function question_grid_header(){
		return $this->belongsTo('App\Models\QuestionGridHeader', 'question_grid_headers_id', 'id');
	}

	public function study_lesson_scope_lesson(){
		return $this->belongsTo('App\Models\StudyLessonScopeLesson', 'study_lesson_scope_lessons_id', 'id');
	}

	public function basic_competency(){
		return $this->belongsTo('App\Models\BasicCompetency', 'basic_competencies_id', 'id');
	}

	public function question_card(){
		return $this->hasMany('App\Models\QuestionCard', 'id', 'question_grids_id');
	}

	public function log_activity_user(){
		return $this->hasMany('App\Models\LogActivity', 'id', 'log_activity_users_id');
	}

	protected static function boot()
    {
        parent::boot();

        static::deleting(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->delete();
                }
            }
        });

        static::restoring(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->withTrashed()->restore();
                }
            }
        });
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
