@extends('admin.admin_master')

@section('admin')

<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <h4>Conatct Page</h4>
                <a href="{{ route('add.contact') }}"><button class="btn btn-primary mb-4">Add conatct</button></a>
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
                                <th scope="col" width="35%">conatct Address</th>
                                <th scope="col" width="25%">conatct email</th>
                                <th scope="col" width="15%">contact phone</th>
                                <th scope="col" width="15%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                            @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>
                                   <a href="{{ url('/contact/edit/'.$contact->id) }}" class="btn btn-info btn-sm">Edit</a>
                                   <a href="{{ url('/contact/delete/'.$contact->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        
                       
            </div>
        </div>
        
    </div>

@endsection


