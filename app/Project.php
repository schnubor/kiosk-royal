<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'color', 'bgcolor', 'position', 'category_id'];

    /**
     * Get the images for the project.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get the category for the project.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
