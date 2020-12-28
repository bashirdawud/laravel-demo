@extends('admin.admin_master')

@section('admin')

<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <h4>Admin Message</h4>
                
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">All Contact Data</div>
                
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col" width="10%">no</th>
                                <th scope="col" width="35%">Name</th>
                                <th scope="col" width="25%">Email</th>
                                <th scope="col" width="15%">Subject</th>
                                <th scope="col" width="15%">Message</th>
                                <th scope="col" width="15%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                            @foreach($messages as $msg)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $msg->name }}</td>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->subject }}</td>
                                <td>{{ $msg->message }}</td>
                                <td>
                                   
                                   <a href="{{ url('/contact/delete/'.$msg->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        
                       
            </div>
        </div>
        
    </div>

@endsection


