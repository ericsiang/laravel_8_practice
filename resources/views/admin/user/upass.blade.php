@extends('admin.layouts.admin_master')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update Password</h2>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('update.pass') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">Current Password</label>
                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control"  name="password" id="password" placeholder="New Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
