<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * The Attachment that belongs to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The Attachment that belongs to the project.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
