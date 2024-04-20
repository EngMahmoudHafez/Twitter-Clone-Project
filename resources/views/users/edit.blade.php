@extends('layout.layout')

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                @include('components.profile-card-edit')

            </div>
            <x-rightbar></x-rightbar>
        </div>
    </div>
@endsection
