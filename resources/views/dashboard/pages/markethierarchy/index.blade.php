@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Employee</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Employee</li>
    </ol>

    <form class="col-md-6" method="POST" action="{{ route('employee.store') }}">
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
{{--            <div class="form-group col-md-6">--}}
{{--                <label for="department_select">Department</label>--}}
{{--                <select class="custom-select custom-select-md mb-3" id="department_select" name="department_id">--}}
{{--                    <option selected>Department</option>--}}
{{--                    @foreach($departments as $department)--}}
{{--                        <option value="{{ $department->id }}">{{ $department->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
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
                    <input id="joining-date" type="text" class="form-control" placeholder="YYYY/MM/DD" name="joining_date">
                </div>
            </div>
        </div>
        <div class="form-group">
</div>
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


        <button type="submit" class="btn btn-success">Add Employee</button>
    </form>

    <div class="col-md-12">
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Employees
            </div>
            <div class="card-body">
                @if (session()->has('deletedEmployeeMsg'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('deletedEmployeeMsg') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="employeeindextable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Employee Name</th>
                            <th>Type</th>
{{--                            <th>Department</th>--}}
                            <th>Mobile</th>
                            <th>Alternative Mobile</th>
                            <th>Email</th>
                            <th>NID</th>
                            <th>Joining Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial No</th>
                            <th>Employee Name</th>
                            <th>Type</th>
{{--                            <th>Department</th>--}}
                            <th>Mobile</th>
                            <th>Alternative Mobile</th>
                            <th>Email</th>
                            <th>NID</th>
                            <th>Joining Date</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse ($employees as $employee )
                            <tr class="department-table-row">
                                <td><a class="clickable-table-row-a"
                                       href="{{ route('employee.show', $employee) }}">{{ $loop->index+1 }}</a></td>
                                <td><a class="clickable-table-row-a"
                                       href="{{ route('employee.show', $employee) }}">{{ $employee->name }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->type }}</a></td>
{{--                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->department->name }}</a></td>--}}
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->mobile }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->alt_mobile }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->email }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->nid }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->joining_date }}</a></td>
                                <td>
                                    <a href="{{ route('employee.edit', $employee) }}"
                                       class="btn btn-primary mr-1 mb-1 ml-2"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Edit"><i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('employee.destroy', $employee) }}"
                                          method="POST"
                                          class="form-btn"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger mr-2"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete" type="submit">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Employee Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
