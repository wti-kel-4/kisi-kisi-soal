<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGridHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'question_grid_headers';
    protected static $relations_to_cascade = ['question_grid'];

    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'profiles_id', 'id');
    }

    public function grade_generalization(){
        return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
    }
    
    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function teacher(){
		return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function question_grid(){
		return $this->hasMany('App\Models\QuestionGrid', 'question_grid_headers_id', 'id');
	}

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($resource){
            foreach(static::$relations_to_cascade as $relation){
                $resource->{$relation}()->forceDelete();
            }
        });

        static::restoring(function($resource) {
            foreach (static::$relations_to_cascade as $relation) {
                $resource->{$relation}()->withTrashed()->restore();
            }
        });
    }
}
