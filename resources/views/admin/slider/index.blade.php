@extends('admin.admin_master')

@section('admin')

<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <h4>Home slider</h4>
                <a href="{{ route('add') }}"><button class="btn btn-primary mb-4">Add slider</button></a>
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">Home Slider</div>
                
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">sl no</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="35%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="15%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                            @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td><img src="{{ asset($slider->image) }}" alt="slider_image" style="height: 40px; width:70px;"></td>
                                <td>
                                   <a href="{{ url('/slider/edit/'.$slider->id) }}" class="btn btn-info btn-sm">Edit</a>
                                   <a href="{{ url('/slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        
                       
            </div>
        </div>
        
    </div>

@endsection


