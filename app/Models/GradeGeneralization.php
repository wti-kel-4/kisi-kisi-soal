<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeGeneralization extends Model
{
    use HasFactory, SoftDeletes;
    
    protected static $relations_to_cascade = ['grade', 'basic_competency', 'question_card_header', 'teacher_grade_generalization']; 

    public function grade() {
        return $this->hasMany('App\Models\Grade', 'id', 'grade_generalizations_id');
    }

    public function basic_competency() {
        return $this->hasMany('App\Models\BasicCompetency', 'id', 'grade_generalizations_id');
    }

    public function question_card_header() {
        return $this->hasMany('App\Models\QuestionCardHeader', 'id', 'grade_generalizations_id');
    }

    public function teacher_grade_generalization() {
        return $this->hasMany('App\Models\TeacherGradeGeneralization', 'id', 'grade_generalizations_id');
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
