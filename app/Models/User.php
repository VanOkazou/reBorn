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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
        return $this->belongsToMany('App\Models\Techno');
    }

    /**
     * The users that have one or many pictures.
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }
}
