<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // READ: Show all students (with Search and Pagination)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('course', 'like', "%{$search}%");
        })
        ->paginate(5)
        ->appends(request()->query()); // Keeps the search term active when clicking pagination links

        return view('students.index', compact('students'));
    }

    // CREATE: Show registration form
    public function create()
    {
        return view('students.create');
    }

    // STORE: Validate and insert data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    // EDIT: Show update form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // UPDATE: Validate and save changes
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // DELETE: Remove record
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
