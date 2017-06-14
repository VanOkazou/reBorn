<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The projects that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * The projects that belong to the category.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * The projects that belong to the techno.
     */
    public function technos()
    {
        return $this->belongsToMany('App\Models\Techno');
    }

    /**
     * The project that has one or many pictures.
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }
}
