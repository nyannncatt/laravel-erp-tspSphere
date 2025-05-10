<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class coursescontroller extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'instructor' => 'required',
            'credits' => 'required|integer',
        ]);

        Courses::create($request->all());
        return redirect()->route('courses.index');
    }

    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);
        $request->validate([
            'course_name' => 'required',
            'instructor' => 'required',
            'credits' => 'required|integer',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index');
    }
}
