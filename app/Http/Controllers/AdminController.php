<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminController extends Controller
{
    // Dashboard - show all students
    public function dashboard()
    {
        $students = Student::all();
        return view('dashboard', compact('students'));
    }

    // Show form to add a new student
    public function create()

{
    return view('createstudent');
}


    // Store a new student in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'grade' => 'required|integer',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Student created successfully.');
    }
}
