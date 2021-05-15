<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeGeneralization extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['id', 'name'];

    protected static $relations_to_cascade = ['grade', 'basic_competency', 'question_card_header', 'teacher_grade_generalization']; 

    public function grade() {
        return $this->hasMany('App\Models\Grade', 'grade_generalizations_id', 'id');
    }

    public function basic_competency() {
        return $this->hasMany('App\Models\BasicCompetency', 'grade_generalizations_id', 'id');
    }

    public function question_card_header() {
        return $this->hasMany('App\Models\QuestionCardHeader', 'grade_generalizations_id', 'id');
    }

    public function teacher_grade_generalization() {
        return $this->hasMany('App\Models\TeacherGradeGeneralization', 'grade_generalizations_id', 'id');
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
