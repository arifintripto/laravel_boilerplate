@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Department</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Department</li>
    </ol>

    <form class="col-md-6" method="POST" action="{{ route('department.store') }}">
        @csrf
        <div class="form-group">
            <label for="department_name">Department Name</label>
            <input type="text" class="form-control" id="department_name" placeholder="Enter Department Name" name="name"
                   autocomplete="off" value="{{ old('name') }}">
            <small class="form-text text-muted">Input new department name here</small>
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


        <button type="submit" class="btn btn-success">Add Department</button>
    </form>

    <div class="col-md-12">
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Departments
            </div>
            <div class="card-body">
                @if (session()->has('deletedDepartmentMsg'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('deletedDepartmentMsg') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="departmentindextable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Department Name</th>
                            <th>Total Employees</th>
                            <th>Total Items</th>
                            <th>Total Value</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial No</th>
                            <th>Department Name</th>
                            <th>Total Employees</th>
                            <th>Total Items</th>
                            <th>Total Value</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse ($departments as $department )
                            <tr class="department-table-row">
                                <td><a class="clickable-table-row-a" href="{{ route('department.show', $department) }}">{{ $loop->index+1 }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('department.show', $department) }}">{{ $department->name }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('department.show', $department) }}">{{ $department->employee->count() }}</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('department.show', $department) }}">80</a></td>
                                <td><a class="clickable-table-row-a" href="{{ route('department.show', $department) }}">BDT 654987</a></td>
                                <td>
                                    <a href="{{ route('department.edit', $department) }}"
                                       class="btn btn-primary mr-1 mb-1 ml-2"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Edit"><i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('department.destroy', $department) }}"
                                          method="POST"
                                          class="form-btn"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Delete" type="submit">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Department Found</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
