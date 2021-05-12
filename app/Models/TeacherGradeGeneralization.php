<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherGradeGeneralization extends Model
{
    use HasFactory, SoftDeletes;

    protected static $relations_to_cascade = ['teacher', 'grade_generalization'];
    protected $table = 'teacher_grade_generalizations';
    public $timestamps = false;

    public function teacher() {
		  return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
	}

    public function grade_generalization() {
		  return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
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
