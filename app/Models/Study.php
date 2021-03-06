<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
  use HasFactory, SoftDeletes;

	  protected $table = 'studies';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'grade_generalizations_id'];

    protected static $relations_to_cascade = ['grade_generalization', 'teacher_study', 'study_lesson_scope_lesson', 'question_grid_header']; 

    public function grade_generalization() {
      return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
    }

    public function teacher_study(){
      return $this->hasMany('App\Models\TeacherStudy', 'studies_id', 'id');
    }

    public function study_lesson_scope_lesson(){
      return $this->hasMany('App\Models\StudyLessonScopeLesson', 'studies_id', 'id');
    }

    public function question_grid_header() {
      return $this->hasMany('App\Models\QuestionGridHeader', 'studies_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($resource){
            foreach(static::$relations_to_cascade as $relation){
                $resource->{$relation}()->delete();
            }
        });

        static::restoring(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                $resource->{$relation}()->withTrashed()->restore();
            }
        });
    }
}
