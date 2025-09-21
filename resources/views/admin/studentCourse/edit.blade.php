@extends('admin.layouts.master')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students Course</h1>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Student Course</h6>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{route('student.course.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Student<span class="text-danger"> *</span></label>
                                <select name="student_id" class="form-control">
                                    <option value="" selected disabled>--Select student--</option>
                                    @foreach ($students as $key => $student)
                                        <option value="{{ $key }}"
                                            {{ $key == $selectedStudent ? 'selected' : '' }}>
                                            {{ $student }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <label for="" class="mt-2">Student Course <span class="text-danger">
                                        *</span></label>
                                <select name="courses[]" class="form-control js-example-basic-multiple" multiple required>
                                    @foreach ($courses as $key => $course)
                                        <option value="{{ $key }}"
                                            {{ in_array($key, $selectedCourses) ? 'selected' : '' }}>{{ $course }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
