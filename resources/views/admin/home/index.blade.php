@extends('admin.admin_master')

@section('admin')

<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <h4>Home About</h4>
                <a href="{{ route('add.about') }}"><button class="btn btn-primary mb-4">Add about</button></a>
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">Home About</div>
                
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">sl no</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="35%">Short Description</th>
                                <th scope="col" width="40%">Long Description</th>
                                <th scope="col" width="15%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                            @foreach($homeabout as $about)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->short_dis }}</td>
                                <td>{{ $about->long_dis }}</td>
                                <td>
                                   <a href="{{ url('/about/edit/'.$about->id) }}" class="btn btn-info btn-sm">Edit</a>
                                   <a href="{{ url('/about/delete/'.$about->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        
                       
            </div>
        </div>
        
    </div>

@endsection


