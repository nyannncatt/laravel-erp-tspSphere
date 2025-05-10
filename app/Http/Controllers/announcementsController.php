<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class announcementsController extends Controller
{
    public function index()
    {
        return view('admin.announcements.index');
    }
}
