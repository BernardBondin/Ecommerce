@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
        <div class="alert alert-success">{{session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Colours List
                    <a href="{{ url('admin/colours/create') }}" class="btn btn-primary btn-sm text-black float-end">Add Colours</a>
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-dark table-hover col-12 text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colours as $colour)
                        <tr>
                            <td>{{ $colour->id }}</td>
                            <td>{{ $colour->name }}</td>
                            <td>{{ $colour->code }}</td>
                            <td>{{ $colour->status ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/colours/'.$colour->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url('admin/colours/'.$colour->id.'/delete') }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @endsection