@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cards</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#sl</th>
                        <th scope="col">Student name</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp

                    @foreach($students as $student)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$student->name?:''}}</td>
                        <td>{{$student->address?:''}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection