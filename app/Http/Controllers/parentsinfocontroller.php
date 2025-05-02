<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parentsinfocontroller extends Controller
{
    public function index()
    {
        return view('admin.parentsinfo.index');
    }
}
