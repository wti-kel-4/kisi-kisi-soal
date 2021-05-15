<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyLessonScopeLesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'study_lesson_scope_lesson';
    protected $fillable = ['id', 'studies_id', 'lessons_id', 'scope_lessons_id'];
    protected static $relations_to_cascade = ['question_grid_header'];

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson', 'lessons_id', 'id');
    }

    public function scope_lesson(){
        return $this->belongsTo('App\Models\ScopeLesson', 'scope_lessons_id', 'id');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function question_grid(){
        return $this->hasMany('App\Models\QuestionGrid', 'study_lesson_scope_lessons_id', 'id');
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
