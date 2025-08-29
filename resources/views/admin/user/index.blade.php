@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Users list</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                {{-- <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">Add</a> --}}
                            </div>
                        </div>

                    </div>
                    <div class="card-body">  
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th> 
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td> 
                                        <td>{{ $user->name ?: '' }}</td>
                                        <td>{{ $user->email ?: '' }}</td>
                                        <td>{{ $user->profile->phone ?? '' }}</td> 
                                        <td>{{ $user->profile->address ?? '' }}</td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
