@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">

        <div class="row">
            @include('admin.shared.leftbar')
            <div class="col-9">
                <h2>Users Page </h2>

                <table class="table table-striped mt-3 ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined At</th>
                            <th>control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->toDateString('d m y //a//t') }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}">show</a>
                                    <a href="{{ route('users.edit', $user->id) }}">edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>{{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection()
