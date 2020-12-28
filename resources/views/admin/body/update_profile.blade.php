@extends('admin.admin_master')


@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update User Profile</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('update.user.profile') }}" class="form-pill" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ asset($user->profile_photo_path) }}">
            <div class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text" name="name"  class="form-control" value="{{ $user->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">User Email</label>
                <input type="text" name="email"  class="form-control" value="{{ $user['email'] }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="file" class="form-control" name="image" >
            </div>
            <div class="form-group">
                <img style="width: 200px; height: 300px;" src="{{ asset($user->profile_photo_path) }}" alt="Profile Image">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-default">Update</button>
            </div>
            
        </form>
    </div>
</div>

@endsection