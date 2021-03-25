@extends('dashboard.layout.master')
@extends('dashboard.layout.layout')


@section('content')
    @include('dashboard.pages.upload_tab_csv.pagetitle')
    @include('dashboard.pages.upload_tab_csv.content')
@endsection
