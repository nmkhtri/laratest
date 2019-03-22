<?php

namespace App\Http\Controllers\Dev;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class developerController extends Controller
{
    public function index()
    {
        print('hello developer');
    }
}
