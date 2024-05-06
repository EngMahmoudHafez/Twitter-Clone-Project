@extends('layout.layout')

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        repet again

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @include('ideas.shared.idea')
            </div>
            @include('components.rightbar')
        </div>
    </div>
@endsection
