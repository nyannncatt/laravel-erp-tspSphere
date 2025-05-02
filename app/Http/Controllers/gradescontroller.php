<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gradescontroller extends Controller
{
    public function index()
    {
        return view('admin.grades.index');
    }
}