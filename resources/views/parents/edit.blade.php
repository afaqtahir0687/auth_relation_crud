@extends('layouts.app')

@section('title', 'Create Parents')

@section('contents')

<style>
    .card{
        background: ivory;
        font-weight: bold;
        font-style: italic;
    }
</style>

<h1 class="mb-0">Add Parents</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Parents
    </div>
    <div class="card-body">
        <form action="{{ url('parents.update', $parents->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name">Parent Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add Parent Name" required value="{{ ($parents->name ?? '') }}"> 
                </div>
                <div class="col">
                    <label for="email">Parent Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Add Parent Email" required value="{{ ($parents->email ?? '') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="tel">Parent Phone</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Add Prent Number" required value="{{ ($parents->phone_number ?? '') }}"/>
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