@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Brands
                    <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm text-black float-end">Add Brands</a>
                </h3>
            </div>
                <div class="card-body">
                </div>
        </div>
    </div>
</div>

@endsection