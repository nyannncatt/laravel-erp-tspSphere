<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentinfocontroller extends Controller
{
    public function index()
    {
        return view('admin.studentinfo.index');
    }
}
