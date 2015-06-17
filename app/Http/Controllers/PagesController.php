<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

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
        return view('pages/backend')
            ->with('users', $users);
    }
    
}
