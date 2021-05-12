<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScopeLesson extends Model
{
    use HasFactory, SoftDeletes;

    protected static $relations_to_cascade = ['study_lesson_scope_lesson'];
    public function study_lesson_scope_lesson(){
        return $this->hasMany('App\Models\StudyLessonScopeLesson', 'scope_lessons_id', 'id');
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
