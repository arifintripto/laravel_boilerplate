@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Add New Employee</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee</a></li>
        <li class="breadcrumb-item active">Add New Employee</li>
    </ol>

    <form class="col-md-6 mb-5" method="POST" action="{{ route('employee.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="employee_name">Full Name</label>
                <input type="text" class="form-control mb-3" id="employee_name" placeholder="Full Name" name="name"
                       autocomplete="off" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="employee_type_select">Employee Type</label>
                <select class="custom-select custom-select-md mb-3" id="employee_type_select" name="type">
                    <option selected>Type</option>
                    <option value="1">RSM</option>
                    <option value="2">ASM</option>
                    <option value="3">TSO</option>
                    <option value="4">SPO</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="department_select">Department</label>
                <select class="custom-select custom-select-md mb-3" id="department_select" name="department_id">
                    <option selected>Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="employee_mobile">Mobile Number</label>
                <input type="text" class="form-control mb-3" id="employee_mobile" placeholder="Mobile Number"
                       name="mobile"
                       autocomplete="off" value="{{ old('mobile') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="employee_alt_mobile">Alternative Mobile Number</label>
                <input type="text" class="form-control mb-3" id="employee_alt_mobile"
                       placeholder="Alternative Mobile Number" name="alt_mobile"
                       autocomplete="off" value="{{ old('alt_mobile') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="employee_email">Email Address</label>
                <input type="email" class="form-control mb-3" id="employee_email" placeholder="Email Address" name="email"
                       autocomplete="off" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="employee_nid">National ID Number</label>
                <input type="text" class="form-control mb-3" id="employee_nid" placeholder="National ID Number" name="nid"
                       autocomplete="off" value="{{ old('nid') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="joining_date">Joining Date</label>
                <div class="input-group date" data-provide="joining-date">
                    <input id="joining-date" type="text" class="form-control" placeholder="YYYY/MM/DD" name="joining_date" autocomplete="off">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Add New Employee</button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


    </form>


@endsection
