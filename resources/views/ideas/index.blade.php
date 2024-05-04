@extends('layout.layout')
@section('title', 'home')

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <x-feeds :ideas="$ideas" class="mt-4 "></x-feeds>
            @include('components.rightbar')
        </div>
    </div>
@endsection()
