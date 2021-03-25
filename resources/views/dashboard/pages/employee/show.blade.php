@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Employee</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/employee">Employee</a></li>
        <li class="breadcrumb-item active">{{ $employee->name }}</li>
    </ol>
    <div class="jumbotron">
        <h1 class="display-4">{{ $employee->name }}</h1>
        <p class="lead">
            <strong>Department: </strong>{{ $employee->department->name }},
            <strong>Mobile: </strong>{{ $employee->mobile }}
            @empty(!($employee->alt_mobile)), {{ $employee->alt_mobile }}@endempty,
            <strong>Email: </strong>{{ $employee->email }}

        </p>
        <a href="{{ $employee->id }}/edit" class="btn btn-success mr-2" title="Edit">
            <i class="far fa-edit"></i> Edit
        </a>
        <form action="{{ route('employee.destroy', $employee->id) }}"
              method="POST"
              style="display: inline-block"
        >

            @csrf
            @method('DELETE')

            <button class="btn btn-danger"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Delete" type="submit">
                <i class="far fa-trash-alt"></i>
                Delete
            </button>
        </form>
        </div>
    <div class="col-md-12">


    </div>
    <div class="col-md-6">
        <div class="panel">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">NID :</th>
                    <td>{{ $employee->nid }}</td>
                </tr>
                <tr>
                    <th scope="row">Joining Date :</th>
                    <td>{{ $employee->joining_date }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
