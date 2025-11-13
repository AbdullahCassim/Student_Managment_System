<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;

class AdminController extends Controller
{
    
    public function dashboard()
    {
        $students = Student::all();
        return view('dashboard', compact('students'));
    }

        
    public function create()
    {
        return view('students.create'); 
    }

    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'grade' => 'required|integer',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
        ]);

       
        Student::create($validated);

       
        return redirect()->route('dashboard')->with('success', 'Student added successfully!');
    }
}