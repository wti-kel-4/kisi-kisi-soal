<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'url_photo',
        'teachers_id',
    ];


    public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
    }
}
