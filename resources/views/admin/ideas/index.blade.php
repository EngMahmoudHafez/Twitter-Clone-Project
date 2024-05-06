@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">

        <div class="row">
            @include('admin.shared.leftbar')
            <div class="col-9">
                <h2>Ideas Page </h2>

                <table class="table table-striped mt-3 ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Content</th>
                            <th>Joined At</th>
                            <th>control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ideas as $idea)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $idea->user->name }}</td>
                                <td>{{ $idea->content }}</td>
                                <td>{{ $idea->created_at->toDateString('d m y //a//t') }}</td>
                                <td>
                                    <a href="/ideas/{{ $idea->id }}">show</a>
                                    <a href="/ideas/{{ $idea->id }}/edit">edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>{{ $ideas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection()
