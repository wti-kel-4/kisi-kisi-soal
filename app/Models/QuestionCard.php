<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCard extends Model
{
    use HasFactory;

    public function question_grid() {
        return $this->belongsTo('App\Models\QuestionGrid', 'question_grids_id', 'id');
    }
}
