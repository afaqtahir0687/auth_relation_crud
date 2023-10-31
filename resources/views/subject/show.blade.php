@extends('layouts.app')

@section('title', 'Create Subject')

@section('contents')

<style>
    .card {
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Edit Subject</h1>
<hr />

<div class="card">
    <div class="card-header">
        Edit Subject
    </div>
    <div class="card-body">
        <form action="{{ url('subject.update', $subject->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="">Subject Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add New Subject" required value="{{ ($subject->name ?? '') }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Add New Description" required value="{{ ($subject->description ?? '') }}" readonly>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection