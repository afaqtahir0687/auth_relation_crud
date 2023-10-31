@extends('layouts.app')

@section('title', 'Edit Course')

@section('contents')

<style>
    .card {
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Edit Course</h1>
<hr />

<div class="card">
    <div class="card-header">
        Edit Course
    </div>
    <div class="card-body">
        <form action="{{ url('courses.update', $courses->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add New Course" required value="{{ ($courses->name ?? '') }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Add New Description" required value="{{ ($courses->description ?? '') }}" readonly>
                </div>
            </div>
            {{-- <div class="row">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div> --}}
        </form>
    </div>
</div>
@endsection