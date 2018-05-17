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
        $categories = Category::all();
        return view('pages/home')
            ->with('categories', $categories);
    }

    /**
     * Display Privacy Page.
     */
    public function privacy()
    {
        $categories = Category::all();
        return view('pages/privacy')
            ->with('categories', $categories);
    }

    /**
     * Display Backend Area.
     */
    public function backend()
    {
        $users = User::where('id', '<>', 1)->get();
        $categories = Category::all();
        $projects = Project::orderBy('position', 'asc')->get();
        $images = Image::all();

        return view('pages/backend')
            ->with('users', $users)
            ->with('categories', $categories)
            ->with('projects', $projects)
            ->with('images', $images);
    }
    
}
