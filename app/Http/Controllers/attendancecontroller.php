<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class attendancecontroller extends Controller
{
    public function index()
    {
        return view('admin.attendance.index');
    }
}
