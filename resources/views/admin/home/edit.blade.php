@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2> Edit Home About</h2>
        </div>
        <div class="card-body">
            @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            <form action="{{ url('/about/update/'.$about->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $about->title }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1" rows="3" >{{ $about->short_dis }}</textarea>
                    @error('short_dis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea class="form-control" name="long_dis" id="exampleFormControlTextarea1" rows="3">{{ $about->long_dis }}</textarea>
                    @error('long_dis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    
                </div>
            </form>
        </div>
    </div>

    

    
</div>

@endsection