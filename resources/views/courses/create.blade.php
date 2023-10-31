@extends('layouts.app')

@section('title', 'Create Course')

@section('contents')

<style>
    .card {
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Add Course</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Course
    </div>
    <div class="card-body">
        <form action="{{ url('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add New Course" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Add New Description" required>
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