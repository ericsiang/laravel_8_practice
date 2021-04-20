<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Brand
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)

                                    <tr>
                                        <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_img) }}" alt="" style='height:40px;width:70px;'/></td>
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('edit.brand',['brand'=>$brand->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.brand',['id'=>$brand->id]) }}" class="btn btn-danger" onClick="return confirm('確定要刪除?');">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All Brand
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.brand') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" name='brand_name'>
                                        @error('brand_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Image</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" name='brand_img'>
                                        @error('brand_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
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
                                @foreach ($trash_brands as $brand)

                                    <tr>
                                        <th scope="row">{{ $trash_brands->firstItem()+$loop->index }}</th>
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
                        {{ $trash_brands->links() }}
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div> --}}


</x-app-layout>
