@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Contact
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Add</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)

                                    <tr>
                                        <th scope="row">{{ $contacts->firstItem()+$loop->index }}</th>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>.
                                        <td>{{ $contact->add }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('edit.contact',['contact'=>$contact->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.contact',['contact'=>$contact->id]) }}" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                All Contact
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.contact') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" placeholder="Enter Email" name='email'>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter phone" name='phone'>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Add</label>
                                        <textarea cols="30" rows="10" name='add' class="form-control"></textarea>
                                        @error('Add')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Contact</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
