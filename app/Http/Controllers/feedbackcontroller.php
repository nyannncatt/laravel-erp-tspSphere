<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class feedbackcontroller extends Controller
{
    public function index()
    {
        return view('admin.feedback.index');
    }
}