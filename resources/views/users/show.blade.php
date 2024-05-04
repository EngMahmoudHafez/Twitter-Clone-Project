@extends('layout.layout')
@section('title', $user->name)

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                @include('components.profile-card')

                @forelse ($ideas as $idea)
                    <x-idea :idea="$idea"></x-idea>
                @empty
                    <h4> NO posts found</h4>
                @endforelse
                {{ $ideas->withQueryString()->links() }}
            </div>
            <x-rightbar></x-rightbar>
        </div>
    </div>
@endsection
