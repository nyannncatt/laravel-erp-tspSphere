<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class gradescontroller extends Controller
{
    // Display a listing of the grades
    public function index()
    {
        $grades = Grades::all(); // Get all grades from the database
        return view('admin.grades.index', compact('grades')); // Pass grades to the view
    }

    // Show the form for creating a new grade
    public function create()
    {
        return view('admin.grades.create'); // Show the form to add a new grade
    }

    // Store a newly created grade in storage
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'grade' => 'required|string|in:A,B,C,D,F',
        ]);

        // Create a new grade record
        Grades::create($request->all());

        // Redirect back to the grades index page with success message
        return redirect()->route('grades.index')->with('success', 'Grade added successfully!');
    }

    // Show the form for editing the specified grade
    public function edit(Grades $grade)
    {
        return view('admin.grades.edit', compact('grade')); // Pass the grade to the edit view
    }

    // Update the specified grade in storage
    public function update(Request $request, Grades $grade)
    {
        // Validate the incoming data
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'grade' => 'required|string|in:A,B,C,D,F',
        ]);

        // Update the grade with the new data
        $grade->update($request->all());

        // Redirect back to the grades index page with success message
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    // Remove the specified grade from storage
    public function destroy(Grades $grade)
    {
        // Delete the grade record
        $grade->delete();

        // Redirect back to the grades index page with success message
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }
}