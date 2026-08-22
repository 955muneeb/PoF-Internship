@extends('layouts.master')

@section('title', 'Welcome | Student Portal')

@section('content')
<section class="min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="badge text-bg-primary rounded-pill px-3 py-2 mb-4">Student Management</span>
                <h1 class="display-3 fw-bold text-dark mb-3">A clearer way to manage your students.</h1>
                <p class="lead text-secondary mb-5">Keep student records, courses, and profile details organized in one simple admin portal.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3 shadow-sm">Login to Admin Portal</a>
            </div>
        </div>
    </div>
</section>
@endsection
