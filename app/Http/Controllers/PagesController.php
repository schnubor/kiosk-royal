<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('pages/backend');
    }
    
}
