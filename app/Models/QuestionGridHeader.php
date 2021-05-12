<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionGridHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'question_grid_header';
    protected static $relations_to_cascade = ['question_grid_header'];
    
    public function profile(){
        return $this->belongsTo('App\Models\Profile', 'profiles_id', 'id');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade', 'grades_id', 'id');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
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
