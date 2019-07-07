<?php

namespace Hdc\Application\Controllers;

use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function index()
    {
        return view('top');
    }
}
