@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Employee</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Employee</li>
    </ol>

    <div class="col-md-12">
        <a href="{{ route('employee.create') }}" class="btn btn-success btn-lg mr-2" title="Edit">
            <i class="fas fa-user-plus"></i> Add New Employee
        </a>
    </div>
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
                            <th>Department</th>
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
                            <th>Department</th>
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
                                <td><a class="clickable-table-row-a" href="{{ route('employee.show', $employee) }}">{{ $employee->department->name }}</a></td>
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
