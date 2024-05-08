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
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Student Name" required>
                    </div>
                    <div class="col">
                        <label for="">Register No</label>
                        <input type="number" name="registration_number" class="form-control" placeholder="Registration Number" required min="1" max="50">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Date Of Birth</label>
                        <input type="text" name="dob" class="form-control datepicker" readonly placeholder="Date Of Birth" required />
                    </div>
                    <div class="col">
                        <label for="">Gender<span class="text-danger">*</span></label>
                        {!! Form::select('gender', \App\Http\Helpers\AppHelper::GENDER, $gender , ['class' => 'form-control select2', 'required' => 'true']) !!}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Fee</label>
                        <input type="number" name="fee" class="form-control" placeholder="Add Fee" required />
                    </div>
                    <div class="col">
                        <label for="">Language</label>
                        {!! Form::select('language', \App\Http\Helpers\AppHelper::LANGUAGES, $language , ['class' => 'form-control select2', 'required' => 'true']) !!}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Status</label>
                        {!! Form::select('status', \App\Http\Helpers\AppHelper::STATUS, null , ['class' => 'form-control select2', 'required' => 'true']) !!}
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />



<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap5',
        format: 'yyyy-mm-dd' // Set the date format to match the database expectation

    });
</script>

@endsection
