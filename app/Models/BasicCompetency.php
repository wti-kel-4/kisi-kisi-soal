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

    // Jangan menghapus relasi yang lain karena akan berpengaruh dengan kisi - kisi lainnya
    protected static $relations_to_cascade = ['question_grid']; 

    public function grade_generalization(){
        return $this->belongsTo('App\Models\GradeGeneralization', 'grade_generalizations_id', 'id');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function question_grid(){
        return $this->hasMany('App\Models\QuestionGrid', 'basic_competencies_id', 'id');
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
