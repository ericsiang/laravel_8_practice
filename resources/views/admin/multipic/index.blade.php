@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Multi  Picture
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Multipic Image</th>
                                <th scope="col">Created At</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($multipics as $multipic)

                                    <tr>
                                        <th scope="row">{{ $multipics->firstItem()+$loop->index }}</th>
                                        <td><img src="{{ asset($multipic->img) }}" alt="" style='height:40px;width:70px;'/></td>
                                        <td>{{ $multipic->created_at->diffForHumans() }}</td>
                                        {{-- <td>
                                            <a href="{{ route('edit.multipic',['multipic'=>$multipic->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.multipic',['id'=>$multipic->id]) }}" class="btn btn-danger" onClick="return confirm('確定要刪除?');">delete</a>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $multipics->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All Brand
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.multipic') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Multi Image</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" name='img[]' multiple=''>
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Multi Image</button>
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
                            Trashed Brand
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trash_multipics as $brand)

                                    <tr>
                                        <th scope="row">{{ $trash_multipics->firstItem()+$loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_img) }}" alt="" style='height:40px;width:70px;'/></td>
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('restore.brand',['id'=>$brand->id]) }}" class="btn btn-info">restore</a>
                                            <a href="{{ route('pdelete.brand',['id'=>$brand->id]) }}" class="btn btn-danger">P delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $trash_multipics->links() }}
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div> --}}


@endsection
