<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'color', 'position'];

    /**
     * Get the projects for the category.
     */
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
