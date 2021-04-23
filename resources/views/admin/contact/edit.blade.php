@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                Edit Contact
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.contact',['contact'=>$contact->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Contact Name" name='email' value='{{ $contact->email  }}'>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter phone" name='phone' value='{{ $contact->phone  }}'>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Add</label>
                                        <textarea class="form-control" id="" name='add' cols="30" rows="10">{{ $contact->add  }}</textarea>
                                        @error('add')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">edit Contact</button>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>


@endsection
