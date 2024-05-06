@extends('layout.layout')

@section('title', 'terms')

@section('content')
    <div class="container py-4">

        <div class="row">
            <x-leftbar></x-leftbar>
            <div class="col-6">
                <h1>@lang('terms.title')</h1>
                <p>@lang('terms.content')</p>

            </div>
            @include('components.rightbar')
        </div>
    </div>
@endsection()
