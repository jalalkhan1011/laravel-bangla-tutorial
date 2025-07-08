@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('submit.form') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">User name</label>
                        <input type="text" name="user_name" value="{{ old('user_name') }}" class="form-control"
                            id="" aria-describedby="emailHelp" placeholder="Enter user name">
                        @error('user_name')
                            <div><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id=""
                            aria-describedby="emailHelp" placeholder="Enter email">
                        @error('email')
                            <div><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
