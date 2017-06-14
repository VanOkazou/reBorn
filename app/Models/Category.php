<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The Categories that belongs to the project.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
