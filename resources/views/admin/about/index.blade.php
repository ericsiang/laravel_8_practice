@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All About
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Desc</th>
                                <th scope="col">Long Desc</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)

                                    <tr>
                                        <th scope="row">{{ $abouts->firstItem()+$loop->index }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_desc }}</td>
                                        <td>{{ $about->long_desc }}</td>
                                        <td>{{ $about->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('edit.about',['about'=>$about->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.about',['about'=>$about->id]) }}" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $abouts->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All About
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.about') }}" method="POST">
                                    @csrf
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">About Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter About Name" name='title'>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Short Desc</label>
                                        <textarea class="form-control" id="" name='short_desc' cols="30" rows="10"></textarea>
                                        @error('short_desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Long Desc</label>
                                        <textarea class="form-control" id="" name='long_desc' cols="30" rows="10"></textarea>
                                        @error('long_desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add About</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
