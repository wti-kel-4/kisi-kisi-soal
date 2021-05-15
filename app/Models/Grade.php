<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'name', 'teachers_id', 'grade_generalizations_id'];

	protected static $relations_to_cascade = ['teacher', 'grade_generalization', 'question_grid_header', 'study']; 

    public function teacher() {
		return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function grade_generalization() {
		return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
	}

	public function question_grid_header() {
		return $this->hasMany('App\Models\QuestionGridHeader', 'grades_id', 'id');
	}

	public function study() {
		return $this->hasMany('App\Models\Study', 'grades_id', 'id');
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
