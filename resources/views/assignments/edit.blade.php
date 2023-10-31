@extends('layouts.app')

@section('title', 'Create Assignment')

@section('contents')

    <style>
        .card {
            background: ivory;
            font-weight: bold;
            font-style: italic;
        }
    
    </style>

    <h1 class="mb-0">Add Assignment</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Assignment
        </div>
        <div class="card-body">
            <form action="{{ url('assignments.update', $assignments->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="">Course Name</label>
                        <select class="form-control" name="course_id" required>
                            @foreach($courses as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Add Title" required value="{{ ($assignments->title ?? '') }}">
                   </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="due_date">Due Date</label>
                        <input type="date" name="due_date" class="form-control" placeholder="Add Due Date" required  value="{{ ($assignments->due_date ?? '') }}"/>
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