@extends('layouts.app')

@section('title', 'Edit Attendance')

@section('contents')

<style>
    .card {
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Edit Attendance</h1>
<hr />

<div class="card">
    <div class="card-header">
        Edit Attendance
    </div>
    <div class="card-body">
        <form action="{{ url('attendance.update', $attendance->id) }}" method="POST" enctype="multipart/form-data">
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
                <select class="form-control" name="student_id" required>
                    @foreach($student as $item)
                    <option value="{{ $item->id }}" {{ $attendance->student_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" placeholder="Add New Date" required value="{{ ($attendance->date ?? '')}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required value="{{ ($attendance->status ?? '')}}">
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
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