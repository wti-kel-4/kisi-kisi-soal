<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCard extends Model
{
    use HasFactory, SoftDeletes;

    protected static $relations_to_cascade = ['question_card_header', 'question_grid']; 
    public function question_grid() {
        return $this->belongsTo('App\Models\QuestionGrid', 'question_grids_id', 'id');
    }

    public function question_card_header(){
        return $this->belongsTo('App\Models\QuestionCardHeader', 'question_card_headers_id', 'id');
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
