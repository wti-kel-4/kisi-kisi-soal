<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';
    protected $fillable = [ 'id', 'username', 'password', 'url_photo', 'teachers_id'];

    protected $primaryKey = 'id';


    public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'teachers_id', 'id');
    }

    public function log_activity_user() {
        return $this->hasMany('App\Models\LogActivity', 'users_id', 'id');
    }

    public function log_activity_user_used() {
        return $this->hasMany('App\Models\LogActivity', 'used_for_users_id', 'id');
    }

    protected static $relations_to_cascade = ['teacher', 'log_activity_user', 'log_activity_user_used']; 
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
