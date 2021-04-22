@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                Edit Slider
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.slider',['slider'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Enter Slider Name" name='title' value='{{ $slider->title  }}'>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Desc</label>
                                        <textarea class="form-control" id="" name='desc' cols="30" rows="10">{{ $slider->desc  }}</textarea>
                                        @error('desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="hidden" class="form-control"   name='old_slider_img' value='{{ $slider->img  }}'>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider Name" name='img'>
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($slider->slider_img) }}" alt=""/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">edit Category</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
