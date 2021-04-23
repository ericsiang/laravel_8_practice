@extends('admin.layouts.admin_master')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update </h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('update.profile') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">User Email</label>
                <input type="text" class="form-control"  name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
