@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Edit Department</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="/department">Department</a></li>
        <li class="breadcrumb-item active">Edit Department</li>
    </ol>

    <form class="col-md-6" method="POST" action="{{ route('department.show', $department) }}">
{{--    <form class="col-md-6" method="POST" action="{{ route("department.edit") }}">--}}
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="department_name">Department Name</label>
            <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name"
                   autocomplete="off" value="{{ $department->name }}" name="name">
            @if(session()->has('message'))
                <small class="form-text text-success">{{ session()->get('message') }}</small>
            @else
                <small class="form-text text-muted">Update Department Name Here</small>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <small class="form-text text-danger">{{ $error }}</small>
                @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection


