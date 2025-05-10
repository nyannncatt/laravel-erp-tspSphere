<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class attendancecontroller extends Controller
{
    // Show the list of attendance records
    public function index()
    {
        $attendances = Attendance::all(); // Retrieve all attendance records
        return view('admin.attendance.index', compact('attendances'));
    }

    // Show the form to create new attendance
    public function create()
    {
        return view('admin.attendance.create');
    }

    // Store new attendance record
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        Attendance::create($request->all()); // Create a new attendance record

        return redirect()->route('attendance.index')->with('success', 'Attendance added successfully!');
    }

    // Show the form to edit an attendance record
    public function edit(Attendance $attendance)
    {
        return view('admin.attendance.edit', compact('attendance'));
    }

    // Update an attendance record
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        $attendance->update($request->all()); // Update the attendance record

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully!');
    }

    // Delete an attendance record
    public function destroy(Attendance $attendance)
    {
        $attendance->delete(); // Delete the attendance record
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully!');
    }
}
