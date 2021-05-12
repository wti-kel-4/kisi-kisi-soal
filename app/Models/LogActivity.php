<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogActivity extends Model
{
    use HasFactory, SoftDeletes;
	protected static $relations_to_cascade = ['question_grid', 'question_card', 'user', 'used_for_user']; 
    protected $table = 'log_activity_users';

    public function question_card() {
		return $this->belongsTo('App\Models\QuestionCard', 'question_grids_id', 'id');
	}

    public function question_grid() {
		return $this->belongsTo('App\Models\QuestionGrid', 'question_cards_id', 'id');
	}

    public function user() {
		return $this->belongsTo('App\Models\User', 'users_id', 'id');
	}

	public function used_for_user() {
		return $this->belongsTo('App\Models\User', 'users_id', 'id');
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
