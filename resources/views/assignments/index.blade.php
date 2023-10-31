@extends('layouts.app')

@section('title', 'Home Assignment')

@section('contents')

<style>
    .table-primary{
        background: palegoldenrod;
         color: darkslategrey;
    }
    .table{
        text-align:center;
    }
    .table-responsive{
        font-weight: bold;
         font-style: italic;
         border-radius: 30px;

    }
</style>

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Assignment</h1>
    <a href="{{ url('assignments.create') }}" class="btn btn-primary">Add Assignment</a>
</div>
<hr />
@if(Session::has('success'))
<div id="success-message" class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="table-responsive" style="background: ivory">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Title</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assignments as $item)
            <tr class="text">
                <td>{{ $item->id }}</td>
                <td>{{ $item->courses->name ?? ''}}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->due_date }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('assignments.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="{{ url('assignments.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('assignments.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">Assignments not found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    });
</script>
@endsection
