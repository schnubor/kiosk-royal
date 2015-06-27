<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['filename', 'position', 'project_id'];

    /**
     * Get the category for the project.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
