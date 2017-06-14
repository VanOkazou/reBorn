<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Techno extends Model
{
    /**
     * The Techno that belongs to the project.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    /**
     * The Techno that belongs to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
