<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCard extends Model
{
    use HasFactory, SoftDeletes;

    protected static $relations_to_cascade = ['question_card_header', 'question_grid', 'log_activity_user']; 
    public function question_grid() {
        return $this->belongsTo('App\Models\QuestionGrid', 'question_grids_id', 'id');
    }

    public function question_card_header(){
        return $this->belongsTo('App\Models\QuestionCardHeader', 'question_card_headers_id', 'id');
    }

    public function log_activity_user(){
        return $this->hasMany('App\Models\LogActivity', 'id', 'question_cards_id');
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
