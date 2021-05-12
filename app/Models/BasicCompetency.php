<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasicCompetency extends Model
{
    protected $table = 'basic_competencies';
    protected $primaryKey = 'id';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'studies_id',
        'grade_specializations_id'
    ];
    protected static $relations_to_cascade = ['grade_generalization', 'study', 'question_grid']; 

    public function grade_generalization(){
        return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function question_grid(){
        return $this->hasMany('App\Models\QuestionGrid', 'id', 'question_grids_id');
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
