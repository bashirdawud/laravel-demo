@extends('admin.admin_master')


@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update Password</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="password" name="old_password" id="current_password" class="form-control"  placeholder="Current Password" autocomplete="current-password">
                @error('old_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" name="password" id="password" class="form-control"  placeholder="New Password" autocomplete="new-password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                @error('confirm_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-default">Save</button>
            </div>
            
        </form>
    </div>
</div>

@endsection