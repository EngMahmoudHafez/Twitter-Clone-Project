@extends('layout.layout')
@section('title', $user->name)

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                @include('users.shared.profile-card-edit')

            </div>
            @include('components.rightbar')
        </div>
    </div>
@endsection
