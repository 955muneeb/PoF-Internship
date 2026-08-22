@extends('layouts.master')

@section('title', 'Admin Dashboard | Student Portal')

@section('content')
<div class="container py-5">
    <div class="p-5 bg-white rounded-4 shadow-sm">
        <span class="badge text-bg-primary mb-3">Admin Portal</span>
        <h1 class="display-6 fw-bold">Welcome to the admin dashboard.</h1>
        <p class="lead text-secondary mb-4">Manage student records and course assignments from one place.</p>
        <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
        <a href="{{ route('students.create') }}" class="btn btn-outline-secondary ms-2">Add Student</a>
    </div>
</div>
@endsection
