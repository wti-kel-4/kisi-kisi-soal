<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicCompetency extends Model
{
    protected $table = 'basic_competencies';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'name',
        'studies_id',
        'grade_specializations_id'
    ];

    public function study() {
		  return $this->belongsTo('App\Models\Study', 'studies_id', 'id');
	}

    public function grade_specialization() {
        return $this->belongsTo('App\Models\GradeSpecialization', 'grade_specializations_id', 'id');
  }
}
