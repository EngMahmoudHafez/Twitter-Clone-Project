@extends('layout.layout')

@section('content')
<div class="container py-4">

    <div class="row">
        <x-leftbar></x-leftbar>
        <x-feeds :ideas="$ideas"></x-feeds>
        <x-rightbar></x-rightbar>
    </div>
</div>
@endsection()