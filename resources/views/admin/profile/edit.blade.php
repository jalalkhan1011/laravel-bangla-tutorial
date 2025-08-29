@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary">Edit profile</h6>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Phone <span class="text-danger"> </span></label>
                                <input type="text" class="form-control" id="" name="phone"
                                    value="{{ $profile->phone }}" aria-describedby="" placeholder="Enter phone number">
                                @error('phone')
                                    <div><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <label for="" class="mt-2">Address <span class="text-danger">
                                    </span></label>
                                <input type="address" class="form-control" id="" name="address"
                                    value="{{ $profile->address }}" aria-describedby="emailHelp"
                                    placeholder="Enter address">
                                @error('address')
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
