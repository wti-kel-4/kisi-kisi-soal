<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teacher_study';

    protected static $relations_to_cascade = ['study', 'teacher']; 
    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
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
