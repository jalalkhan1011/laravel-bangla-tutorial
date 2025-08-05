@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Student list</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">Add</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Address</th>
                                    <th scope="col">Student Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img src="{{ asset('upload/studentImage/' . $student->student_image) }}" height="50"></td>
                                        <td>{{ $student->student_name ?: '' }}</td>
                                        <td>{{ $student->student_address ?: '' }}</td>
                                        <td>{{ $student->student_email ?: '' }}</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a
                                                        href="{{ route('students.show', $student->slug) }}"
                                                        class="btn btn-sm btn-success">View</a></li>
                                                <li class="list-inline-item"><a
                                                        href="{{ route('students.edit', $student->slug) }}"
                                                        class="btn btn-sm btn-warning">Edit</a></li>
                                                <li class="list-inline-item">
                                                    <form action="{{ route('students.destroy', $student->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
