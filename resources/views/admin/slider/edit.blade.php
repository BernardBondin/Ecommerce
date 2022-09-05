@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
        <div class="alert alert-success">{{session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Sliders
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-black float-end">BACK</a>
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ url('admin/sliders/.$slider->id') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT');

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $slider->title }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset("$slider->image") }}" style="width: 120px; height: 120px;" alt="slider">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <br>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }} style="width: 25px; height: 25px;">
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