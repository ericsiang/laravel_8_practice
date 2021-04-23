@extends('admin.layouts.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Contact Message
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width='5%'>#</th>
                                <th scope="col" width='5%'>Name</th>
                                <th scope="col" width='15'>Email</th>
                                <th scope="col" width='15'>Subject</th>
                                <th scope="col" width='40'>Message</th>
                                <th scope="col" width='20'>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_forms as $contact_form)

                                    <tr>
                                        <th scope="row">{{ $contact_forms->firstItem()+$loop->index }}</th>
                                        <td>{{ $contact_form->name }}</td>
                                        <td>{{ $contact_form->email }}</td>
                                        <td>{{ $contact_form->subject }}</td>
                                        <td>{{ $contact_form->msg }}</td>
                                        <td>{{ $contact_form->created_at->diffForHumans() }}</td>
                                        {{-- <td>
                                            <a href="{{ route('edit.contact_form',['contact_form'=>$contact_form->id]) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('delete.contact_form',['contact_form'=>$contact_form->id]) }}" class="btn btn-danger">delete</a>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $contact_forms->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
