@extends('layouts.app')

@section('title', 'Create Class')

@section('contents')

    <style>
        .card {
            background: ivory;
            font-weight: bold;
            font-style: italic;
        }
    
    </style>

    <h1 class="mb-0">Add Class</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Class
        </div>
        <div class="card-body">
            <form action="{{ url('classes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row mb-3">
                    <div class="col">
                        <label for="name">Class Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Add New Name" required>
                    </div>
                </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Add New Description" required>
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <div class="col">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Add New Subject" required />
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <div class="col">
                        <label for="subject">Subject</label>
                        <select name="subject" class="form-control" required>
                            <option value="">Select A Subject</option>
                            <option value="math">Math</option>
                            <option value="science">Science</option>
                            <option value="biology">Biology</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="physics">Physics</option>
                            <option value="computer">Computer</option>
                            <option value="pak_Std">Pak Std</option>
                            <option value="ecnomic">Ecnomic</option>
                            <option value="english">English</option>
                            <option value="health">Health</option>
                            <option value="arabic">Arabic</option>
                            <option value="history">History</option>
                        </select>
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