<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function lists($string)
    {
    }

    /**
     * The users that belong to the project.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    /**
     * The users that belong to the techno.
     */
    public function technos()
    {
        return $this->belongsToMany('App\Models\Techno')->withPivot('user_id', 'techno_id', 'pourcentage', 'version');
    }

    /**
     * The users that have one or many pictures.
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
