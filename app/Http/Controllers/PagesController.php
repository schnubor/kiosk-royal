<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Project;
use App\Image;

class PagesController extends Controller
{
    /**
     * Display Homepage.
     */
    public function home()
    {
        return view('pages/home');
    }

    /**
     * Display Backend Area.
     */
    public function backend()
    {
        $users = User::where('id', '<>', 1)->get();
        $categories = Category::all();
        $projects = Project::all();
        $images = Image::all();

        return view('pages/backend')
            ->with('users', $users)
            ->with('categories', $categories)
            ->with('projects', $projects)
            ->with('images', $images);
    }
    
}
