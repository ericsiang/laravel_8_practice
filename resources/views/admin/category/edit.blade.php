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
                                Edit Category
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.category',['category'=>$category->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Update Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name='category_name' value='{{ $category->category_name  }}'>
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">edit Category</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
