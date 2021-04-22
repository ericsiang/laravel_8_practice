@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                Edit About
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.about',['about'=>$about->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Update About Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter About Name" name='title' value='{{ $about->title  }}'>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Short Desc</label>
                                        <textarea class="form-control" id="" name='short_desc' cols="30" rows="10">{{ $about->short_desc  }}</textarea>
                                        @error('short_desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Long Desc</label>
                                        <textarea class="form-control" id="" name='long_desc' cols="30" rows="10">{{ $about->long_desc  }}</textarea>
                                        @error('long_desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">edit About</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>


@endsection
