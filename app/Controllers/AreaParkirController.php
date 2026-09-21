<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;

class AreaParkirController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
}
