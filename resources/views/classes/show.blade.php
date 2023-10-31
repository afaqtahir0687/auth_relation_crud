@extends('layouts.app')

@section('title', 'Edit Class')

@section('contents')

<style>
    .card{
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
        <form action="{{ url('classes.update', $class->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name</label>
                    <input type="name" name="name" class="form-control" placeholder="Add New Name" required value="{{ ($class->name ?? '')}}" readonly>
                </div>
                <div class="col">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Add New Description" required value="{{ ($class->description ?? '')}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control"  placeholder="Add New Subject" required value="{{ ($class->subjects ?? '')}}" readonly/>
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