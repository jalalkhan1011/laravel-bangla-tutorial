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
                            <h6 class="m-0 font-weight-bold text-primary">Student Info</h6>
                        </div>

                    </div>
                    <div class="card-body">
                        <p>Student Name: {{ $student->student_name ?: '' }}</p>
                        <p>Student Email: {{ $student->student_email ?: '' }}</p>
                        <p>Student Address: {{ $student->student_address ?: '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
