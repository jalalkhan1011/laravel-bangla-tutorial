@extends('admin.layouts.master')

@push('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush
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
                                <input type="file" class="filepond-student-image" id="" name="student_image"
                                    placeholder="Enter student image">
                                @error('student_image')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror

                                <label for="" class="mt-2">Parent Image</label>
                                <input type="file" class="filepond-parent-image" id="" name="parent_image"
                                    placeholder="Enter student image">
                                @error('parent_image')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror

                                <label for="" class="mt-2">Multiple Image</label>
                                <input type="file" class="filepond-multiple" id="" name="student_mul_image[]"
                                    placeholder="Enter student image" multiple>
                                @error('student_mul_image')
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

@push('js')
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        // Register the plugin
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Turn all file input elements into ponds
        // Single Image Input
        FilePond.create(document.querySelector('.filepond-student-image'), {
            allowImagePreview: true,
            imagePreviewHeight: 150,
            acceptedFileTypes: ['image/*'],
            allowMultiple: false,
            instantUpload: false,
            storeAsFile: true, // Only upload on form submit 
            files: [{
                source: "{{ asset('upload/studentImage/' . $student->student_image) }}",
                options: {
                    // type: 'local',
                    metadata: {
                        poster: "{{ asset('upload/studentImage/' . $student->student_image) }}"
                    }
                }
            }]

        });

        FilePond.create(document.querySelector('.filepond-parent-image'), {
            allowImagePreview: true,
            imagePreviewHeight: 150,
            acceptedFileTypes: ['image/*'],
            allowMultiple: false,
            instantUpload: false,
            storeAsFile: true, // Only upload on form submit 
            files: [{
                source: "{{ asset('storage/' . $student->parent_image) }}",
                options: {
                    // type: 'local',
                    metadata: {
                        poster: "{{ asset('storage/' . $student->parent_image) }}"
                    }
                }
            }]

        });

        // Multiple Image Input
        FilePond.create(document.querySelector('.filepond-multiple'), {
            allowImagePreview: true,
            imagePreviewHeight: 150,
            acceptedFileTypes: ['image/*'],
            allowMultiple: true,
            maxFiles: 10, // চাইলে সীমা নির্ধারণ করো
            instantUpload: false,
            storeAsFile: true,
            files: [
                @foreach ($student->studentImages as $image)
                    {
                        source: "{{ asset('upload/studentMulImage/' . $image->student_mul_image) }}",
                        options: {
                            // type: 'limbo'
                            metadata: {
                                poster: "{{ asset('upload/studentMulImage/' . $image->student_mul_image) }}"
                            }
                        }
                    },
                @endforeach
            ]
        });
    </script>
@endpush
