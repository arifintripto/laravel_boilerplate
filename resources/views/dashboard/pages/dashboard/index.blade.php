@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    <h2 class="mt-4">Dashboard</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    @include('dashboard.pages.dashboard.topcards')
    @include('dashboard.pages.dashboard.charts')
    @include('dashboard.pages.dashboard.datatable')
@endsection
