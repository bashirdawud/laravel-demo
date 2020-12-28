@extends('admin.admin_master')

@section('admin')  
<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col-md-8">
            
            <div class="card-group">
                @foreach($images as $image)

                <div class="col-md-4 mt-5 mr-4">
                    <div class="card">
                        <img src="{{ asset($image->image) }}" alt="" style="height: 200px; width:250px;">
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Multiple Image</div>
                <div class="card-body">
                    <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                            <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                            @error('image')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

        
</div>

@endsection
