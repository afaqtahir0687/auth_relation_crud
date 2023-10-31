@extends('layouts.app')

@section('title', 'Home Fees')

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
    <h1 class="mb-0">List Fees</h1>
    <a href="{{ url('fees.create') }}" class="btn btn-primary">Add Fees</a>
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
                <th>Student Name</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fees as $item)
            <tr class="text">
                <td>{{ $item->id }}</td>
                <td>{{ $item->student->name }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->due_date }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('fees.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="{{ url('fees.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('fees.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">Fees not found</td>
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
