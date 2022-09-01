@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
        <div class="alert alert-success">{{session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Add Colours
                    <a href="{{ url('admin/colours/') }}" class="btn btn-danger btn-sm text-black float-end">BACK</a>
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ url('admin/colours/create/') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Colour Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Colour Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 25px; height: 25px;">
                        <br>
                        Checked=Hidden
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success float-end">Save</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
    @endsection