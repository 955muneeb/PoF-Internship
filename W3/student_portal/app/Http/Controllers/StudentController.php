<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show the upload form

// READ: Show all students with their assigned courses
    public function index()
    {
        // Eager load the 'course' relationship and paginate the results
        $students = Student::with('course')->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    // Process the form and save the image
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'course_id' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('profile_picture');

        // This is the Day 14 Magic: Handling the File Upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $data['profile_picture'] = $path;
        }

        Student::create($data);

        return back()->with('success', 'Student and Profile Picture Saved Successfully!');
    }
}
