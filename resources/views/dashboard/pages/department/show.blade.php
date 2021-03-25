@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Department</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/department">Department</a></li>
        <li class="breadcrumb-item active">{{ $department->name }}</li>
    </ol>

    <div class="col-md-12">
        <h1><strong>{{ $department->name }}</strong></h1>
        <a href="{{ $department->id }}/edit" class="btn btn-primary mr-1" data-bs-toggle="tooltip" data-bs-placement="top"
           title="Edit">
            <i class="far fa-edit"></i> Edit
        </a>
        <form action="{{ route('department.destroy', $department->id) }}"
              method="POST"
              style="display: inline-block"
        >

            @csrf
            @method('DELETE')

            <button class="btn btn-danger"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Delete" type="submit">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </div>

@endsection
