@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">

        <div class="row">
            @include('admin.shared.leftbar')
            <div class="col-9">
                <h2 class="pb-5">Admin Page </h2>

                <div class="row">
                    @include('admin.shared.widgit', [
                        'tittle' => 'Total Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalusers,
                    ])
                    @include('admin.shared.widgit', [
                        'tittle' => 'Total Ideas',
                        'icon' => 'fas fa-lightbulb',
                        'data' => $totalideas,
                    ])
                    @include('admin.shared.widgit', [
                        'tittle' => 'Total Comments',
                        'icon' => 'fas fa-comment',
                        'data' => $totalcomments,
                    ])

                </div>
            </div>
        </div>
    </div>
@endsection()
