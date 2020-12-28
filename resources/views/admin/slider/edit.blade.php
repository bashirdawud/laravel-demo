@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2> Edit Slider</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            <form action="{{ url('/slider/update/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="old_image" value="{{ $slider->image }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider title</label>
                    <input type="text" value="{{ $slider->title }}" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $slider->description }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload file</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <img style="width: 400px; height: 200px;" src="{{ asset($slider->image) }}" alt="slider_image">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
                    
                </div>
            </form>
        </div>
    </div>

    

    
</div>

@endsection