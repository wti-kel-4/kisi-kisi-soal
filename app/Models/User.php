<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

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

    public function log_activity_user() {
        return $this->hasMany('App\Models\LogActivity', 'id', 'users_id');
    }

    public function log_activity_user_used() {
        return $this->hasMany('App\Models\LogActivity', 'id', 'used_for_user_users_id');
    }

    protected static $relations_to_cascade = ['teacher', 'log_activity_user', 'log_activity_user_used']; 
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
