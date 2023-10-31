@extends('layouts.app')

@section('title', 'Create Exam')

@section('contents')

    <style>
        .card {
            background: ivory;
            font-weight: bold;
            font-style: italic;
        }
    
    </style>

    <h1 class="mb-0">Add Exam</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Exam
        </div>
        <div class="card-body">
            <form action="{{ url('exams.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="">Class Name</label>
                        <select class="form-control" name="class_id" required>
                            @foreach($class as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="">Subject Name</label>
                        <select class="form-control" name="subject_id" required>
                            @foreach($subject as $item)
                                <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="date">Exam Date</label>
                        <input type="date" name="date" class="form-control" placeholder="Add New Date" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Add New Title" required />
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