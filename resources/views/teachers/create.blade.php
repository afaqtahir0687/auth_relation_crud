@extends('layouts.app')

@section('title', 'Create Teacher')

@section('contents')

<style>
    .card{
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Add Teacher</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Teacher
    </div>
    <div class="card-body">
        <form action="{{ url('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name">Teacher Name</label>
                    <input type="name" name="name" class="form-control" placeholder="Add New Name" required>
                </div>
                <div class="col">
                    <label for="email">Teacher Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Add New Email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tel">Teacher Phone</label>
                    <input type="tel" name="phone" class="form-control"  placeholder="Add New Number" required />
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