@extends('layout.layout')
@section('title', 'home')

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            @include('ideas.feeds')
            @include('components.rightbar')
        </div>
    </div>
@endsection()
