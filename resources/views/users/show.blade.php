@extends('layout.layout')
@section('title', $user->name)

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                @include('users.shared.profile-card')

                @forelse ($ideas as $idea)
                    @include('ideas.shared.idea')
                @empty
                    <h4> NO posts found</h4>
                @endforelse
                {{ $ideas->withQueryString()->links() }}
            </div>
            @include('components.rightbar')
        </div>
    </div>
@endsection
