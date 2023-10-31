@extends('layouts.app')

@section('title', 'Show Student')

@section('contents')
<h1 class="mb-0">Show Student</h1>
<hr />

<div class="card">
    <div class="card-header">
        Show Student
    </div>
    <div class="card-body">
        <form action="{{ url('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="">Student Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Student Name" required value="{{ ($student->name ?? '')}}" readonly>
                </div>
                <div class="col">
                    <label for="">Student Registration</label>
                    <input type="number" name="registration_number" class="form-control" placeholder="Registration Number" required value="{{ ($student->registration_number ?? '')}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Student Dob</label>
                    <input type="date" name="dob" class="form-control" placeholder="Date Of Birth" required value="{{ ($student->dob ?? '')}}" readonly/>
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