@extends('layouts.master')

@section('title', 'Add Student | Student Portal')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="mb-4">
                <h1 class="h2 fw-bold mb-1">Add New Student</h1>
                <p class="text-secondary mb-0">Create a student record and assign a course.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label fw-semibold">Assign Course</label>
                            <select id="course_id" name="course_id" class="form-select" required>
                                <option value="" disabled {{ old('course_id') ? '' : 'selected' }}>-- Select a Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>{{ $course->name }} ({{ $course->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="profile_picture" class="form-label fw-semibold">Profile Picture</label>
                            <input id="profile_picture" type="file" name="profile_picture" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Student Record</button>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
