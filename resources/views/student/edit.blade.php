@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Student</h6>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.update', $student->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Student Name <span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="" name="student_name"
                                    value="{{ $student->student_name }}" aria-describedby=""
                                    placeholder="Enter student name">
                                @error('student_name')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <label for="" class="mt-2">Student Email <span class="text-danger">
                                        *</span></label>
                                <input type="email" class="form-control" id="" name="student_email"
                                    value="{{ $student->student_email }}" aria-describedby="emailHelp"
                                    placeholder="Enter student email">
                                @error('student_email')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <label for="" class="mt-2">Student Address</label>
                                <input type="text" class="form-control" id="" name="student_address"
                                    value="{{ $student->student_address }}" aria-describedby="emailHelp"
                                    placeholder="Enter student address">

                                <label for="" class="mt-2">Image</label>
                                <input type="file" class="form-control" id="" name="student_image"
                                    placeholder="Enter student image">
                                @error('student_image')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror

                                <label for="" class="mt-2">Parent Image</label>
                                <input type="file" class="form-control" id="" name="parent_image"
                                    placeholder="Enter student image">
                                @error('parent_image')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
