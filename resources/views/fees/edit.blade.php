@extends('layouts.app')

@section('title', 'Create Fees')

@section('contents')

    <style>
        .card {
            background: ivory;
            font-weight: bold;
            font-style: italic;
        }
    
    </style>

    <h1 class="mb-0">Add Fees</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Fees
        </div>
        <div class="card-body">
            <form action="{{ url('fees.update', $fees->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Add Amount" required
                        min="300" max="1000" value="{{ ($fees->amount ?? '') }}">
                   </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="due_date">Due Date</label>
                        <input type="date" name="due_date" class="form-control" placeholder="Add Due Date" required  value="{{ ($fees->due_date ?? '') }}"/>
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