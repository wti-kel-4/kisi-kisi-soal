<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

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
}
