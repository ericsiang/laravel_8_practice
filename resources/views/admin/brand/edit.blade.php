@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                Edit Brand
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.brand',['brand'=>$brand->id]) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Update Brand Name</label>
                                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Enter Brand Name" name='brand_name' value='{{ $brand->brand_name  }}'>
                                        @error('brand_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Image</label>
                                        <input type="hidden" class="form-control"   name='old_brand_img' value='{{ $brand->brand_img  }}'>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" name='brand_img'>
                                        @error('brand_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($brand->brand_img) }}" alt=""/>
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
