@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">

        <div class="row">
            @include('admin.shared.leftbar')
            <div class="col-9">
                <h2>Admin Page </h2>
            </div>
        </div>
    </div>
@endsection()
