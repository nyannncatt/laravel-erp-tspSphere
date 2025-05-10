<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;

class studentinfocontroller extends Controller
{
    public function index()
    {
        $students = StudentInfo::all();
        return view('admin.studentinfo.index', compact('students'));
    }

    public function create()
    {
        return view('admin.studentinfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:student_infos',
            'phone' => 'required',
            'grade' => 'required',
        ]);

        StudentInfo::create($request->all());
        return redirect()->route('studentinfo.index')->with('success', 'Student added.');
    }

    public function edit(StudentInfo $studentinfo)
    {
        return view('admin.studentinfo.edit', compact('studentinfo'));
    }

    public function update(Request $request, StudentInfo $studentinfo)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:student_infos,email,' . $studentinfo->id,
            'phone' => 'required',
            'grade' => 'required',
        ]);

        $studentinfo->update($request->all());
        return redirect()->route('studentinfo.index')->with('success', 'Student updated.');
    }

    public function destroy(StudentInfo $studentinfo)
    {
        $studentinfo->delete();
        return redirect()->route('studentinfo.index')->with('success', 'Student deleted.');
    }
}
