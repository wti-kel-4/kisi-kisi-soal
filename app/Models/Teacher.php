<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'name', 'nip'];

    protected static $relations_to_cascade = ['grade', 'user', 'teacher_study', 'question_card_header', 'teacher_grade_generalization']; 
    
    public function grade() {
        return $this->hasMany('App\Models\Grade', 'teachers_id', 'id');
    }

    public function user() {
        return $this->hasMany('App\Models\User', 'teachers_id', 'id');
    }

    public function teacher_study() {
        return $this->hasMany('App\Models\TeacherStudy', 'teachers_id', 'id');
    }

    public function question_card_header() {
        return $this->hasMany('App\Models\QuestionCardHeader', 'teachers_id', 'id');
    }

    public function teacher_grade_generalization(){
        return $this->hasMany('App\Models\TeacherGradeGeneralization', 'teachers_id', 'id');
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
