<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->user_id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
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


</x-app-layout>