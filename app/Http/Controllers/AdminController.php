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
        return view('createstudent'); 
    }

    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer',
            'grade' => 'required|integer',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:students,email',
        ]);

       
        Student::create($validated);

       
        return redirect()->route('dashboard')->with('success', 'Student added successfully!');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'grade' => 'required|integer',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->route('dashboard')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('dashboard')->with('success', 'Student deleted successfully!');
    }

}