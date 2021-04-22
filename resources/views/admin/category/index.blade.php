@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Category
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)

                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->user->name }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('edit.category',['category'=>$category->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.category',['category'=>$category->id]) }}" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All Category
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.category') }}" method="POST">
                                    <div class="form-group">
                                        @csrf
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name='category_name'>
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Trashed Category
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trash_categories as $category)

                                    <tr>
                                        <th scope="row">{{ $trash_categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->user->name }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('restore.category',['id'=>$category->id]) }}" class="btn btn-info">restore</a>
                                            <a href="{{ route('pdelete.category',['id'=>$category->id]) }}" class="btn btn-danger">P delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $trash_categories->links() }}
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>

@endsection
