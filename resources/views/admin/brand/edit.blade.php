
@extends('admin.admin_master')

@section('admin')

    
<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                <div class="card-header">Edit Brand</div>
                <div class="card-body">
                    <form action="{{ url('/brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                          <input type="text" name="brand_name" class="form-control" value="{{ $brands->brand_name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Update Image</label>
                            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ $brands->brand_image }}">
                            @error('brand_image')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                              <img src="{{ asset($brands->brand_image) }}" style="width: 400px; height: 200px;" alt="brand_image" >
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                      </form>
                </div>


                    
                </div>
                       
            </div>
        

        
    
    </div>     
</div>

@endsection

