<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCardHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'question_card_headers';
    protected static $relations_to_cascade = ['teacher', 'question_card', 'grade_generalization', 'log_activity_user']; 

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
    }

    public function question_card(){
        return $this->hasMany('App\Models\QuestionCard', 'question_card_headers_id', 'id');
    }

    public function grade_generalization(){
        return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
    }

    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'profiles_id', 'id');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function log_activity_user(){
        return $this->hasMany('App\Models\LogActivity', 'question_card_headers_id', 'id');
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
