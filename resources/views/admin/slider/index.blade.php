@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Slider
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="10%">#>Title</th>
                                <th scope="col" width="25%">#>Desc</th>
                                <th scope="col" width="15%">#>Image</th>
                                <th scope="col" width="15%">#>Created At</th>
                                <th scope="col" width="30%">#>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)

                                    <tr>
                                        <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->desc }}</td>
                                        <td><img src="{{ asset($slider->img) }}" alt="" style='height:40px;width:70px;'/></td>
                                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('edit.slider',['slider'=>$slider->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.slider',['id'=>$slider->id]) }}" class="btn btn-danger" onClick="return confirm('確定要刪除?');">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $sliders->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All Slider
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.slider') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider Name" name='title'>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Desc</label>
                                        <textarea class="form-control" id="" name='desc' cols="30" rows="10"></textarea>
                                        @error('desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider Name" name='img'>
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Slider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Trashed Slider
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Slider Name</th>
                                <th scope="col">Slider Image</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trash_sliders as $slider)

                                    <tr>
                                        <th scope="row">{{ $trash_sliders->firstItem()+$loop->index }}</th>
                                        <td>{{ $slider->slider_name }}</td>
                                        <td><img src="{{ asset($slider->slider_img) }}" alt="" style='height:40px;width:70px;'/></td>
                                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('restore.slider',['id'=>$slider->id]) }}" class="btn btn-info">restore</a>
                                            <a href="{{ route('pdelete.slider',['id'=>$slider->id]) }}" class="btn btn-danger">P delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $trash_sliders->links() }}
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div> --}}
@endsection


