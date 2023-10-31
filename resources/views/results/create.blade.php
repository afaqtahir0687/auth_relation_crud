@extends('layouts.app')

@section('title', 'Create Result')

@section('contents')

    <style>
        .card {
            background: ivory;
            font-weight: bold;
            font-style: italic;
        }
    
    </style>

    <h1 class="mb-0">Add Result</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Result
        </div>
        <div class="card-body">
            <form action="{{ url('results.store') }}" method="POST" enctype="multipart/form-data">
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
              {{-- <div class="row mb-3">
                    <div class="col">
                        <label for="">Exam</label>
                        <select class="form-control" name="exam_id" required>
                            @foreach($exam as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <div class="col">
                        <label for="">Student Name</label>
                        <select class="form-control" name="student_id" required>
                            @foreach($student as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="row mb-3">
                    <div class="col">
                        <label for="obtained_marks">Obtained Marks</label>
                        <input type="number" name="obtained_marks" class="form-control" placeholder="Add Obtained Marks" required min="1" max="100">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="total_marks">Total Marks</label>
                        <input type="number" name="total_marks" class="form-control" placeholder="Add Total Marks" required min="100" max="100" />
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