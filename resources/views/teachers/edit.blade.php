@extends('layouts.app')

@section('title', 'Edit Teacher')

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
        Edit Teacher
    </div>
    <div class="card-body">
        <form action="{{ url('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name">Teacher Name</label>
                    <input type="name" name="name" class="form-control" placeholder="Add New Name" required value="{{($teacher->name ?? '')}}">
                </div>
                <div class="col">
                    <label for="email">Teacher Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Add New Email" required value="{{($teacher->email ?? '')}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tel">Teacher Phone</label>
                    <input type="tel" name="phone" class="form-control"  placeholder="Add New Number" required value="{{($teacher->phone ?? '')}}"/>
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