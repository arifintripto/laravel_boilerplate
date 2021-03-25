@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    @include('dashboard.pages.all_tabs.pagetitle')
    @include('dashboard.pages.all_tabs.table')
@endsection
