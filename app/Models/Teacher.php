<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected static $relations_to_cascade = ['grade', 'user', 'teacher_study', 'question_card_header', 'teacher_grade_generalization']; 
    
    public function grade() {
        return $this->hasMany('App\Models\Grade', 'id', 'teachers_id');
    }

    public function user() {
        return $this->hasMany('App\Models\User', 'id', 'teachers_id');
    }

    public function teacher_study() {
        return $this->hasMany('App\Models\TeacherStudy', 'id', 'teachers_id');
    }

    public function question_card_header() {
        return $this->hasMany('App\Models\QuestionCardHeader', 'id', 'teachers_id');
    }

    public function teacher_grade_generalization(){
        return $this->hasMany('App\Models\TeacherGradeGeneralization', 'id', 'teachers_id');
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
