@extends('layouts.app')

@section('title', 'Home Students')

@section('contents')

<style>

    .body{
     font-family: "Times New Roman", Times, serif;

    }

    .table-primary {
        background: palegoldenrod;
        color: darkslategrey;
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
    }

    .table {
        text-align: center;
        font-family: "Times New Roman", Times, serif;
    }

    .table-responsive {
        font-weight: bold;
        font-style: italic;
        /* border-radius: 15px; */
        font-family: "Times New Roman", Times, serif;

    }

    .button {
        border-radius: 4px;
        background-color: blueviolet;
        border: none;
        font-weight: bold;
        font-style: italic;
        color: #FFFFFF;
        text-align: center;
        font-size: 18px;
        border-radius: 15px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
        font-family: "Times New Roman", Times, serif;

    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        font-family: "Times New Roman", Times, serif;

    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
        font-family: "Times New Roman", Times, serif;

    }

    .button:hover span {
        padding-right: 25px;
        font-family: "Times New Roman", Times, serif;

    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
        font-family: "Times New Roman", Times, serif;

    }

</style>

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Students</h1>
    <a href="{{ url('students.create') }}" class="button btn btn-primary"><span>Add Student</span></a>

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
                <th>Name</th>
                <th>Registration Number</th>
                <th>Date Of Birth</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($student as $item)
            <tr class="text">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->registration_number }}</td>
                <td>{{ $item->dob }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('students.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="{{ url('students.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('students.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">Student not found</td>
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