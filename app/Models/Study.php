<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
	  protected $table = 'studies';
    protected $primaryKey = 'id';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'teachers_id',
		    'grades_id',
    ];

    protected static $relations_to_cascade = ['grade', 'teacher_study', 'study_lesson_scope_lesson', 'question_grid_header']; 

    public function grade() {
      return $this->belongsTo('App\Models\Grade', 'grades_id', 'id');
    }

    public function teacher_study(){
      return $this->hasMany('App\Models\TeacherStudy', 'id', 'studies_id');
    }

    public function study_lesson_scope_lesson(){
      return $this->hasMany('App\Models\StudyLessonScopeLesson', 'id', 'studies_id');
    }

    public function question_grid_header() {
      return $this->hasMany('App\Models\QuestionGridHeader', 'id', 'studies_id');
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
}
