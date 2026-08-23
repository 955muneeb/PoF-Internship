<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource; // <-- We imported our new Resource!

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        // Return a collection (array) of filtered resources
        return StudentResource::collection($students);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string',
            'course' => 'required|string'
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Student created successfully!',
            // Return a single filtered resource
            'data' => new StudentResource($student)
        ], 201);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return new StudentResource($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $id,
            'phone' => 'nullable|string',
            'course' => 'sometimes|required|string'
        ]);

        $student->update($validated);

        return response()->json([
            'message' => 'Student updated successfully!',
            'data' => new StudentResource($student)
        ], 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully!'], 200);
    }
}
