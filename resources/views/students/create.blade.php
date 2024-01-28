@extends('layouts.app')

@section('title', 'Create Student')

@section('contents')

<style>
    .card{
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Add Student</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Student
    </div>
    <div class="card-body">
        <form action="{{ url('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="">Student Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Student Name" required>
                </div>
                <div class="col">
                    <label for="">Student Registration</label>
                    <input type="number" name="registration_number" class="form-control" placeholder="Registration Number" required min="1" max="50">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Student Dob</label>
                    <input type="date" name="dob" class="form-control" placeholder="Date Of Birth" required />
                </div>
            </div>
            <div class="row">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection