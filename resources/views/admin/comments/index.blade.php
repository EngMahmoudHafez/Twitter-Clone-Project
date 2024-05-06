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
                            <th>Idea</th>
                            <th>Content</th>
                            <th>Joined At</th>
                            <th>control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a></td>
                                <td><a href="/ideas/{{ $comment->idea->id }}">{{ $comment->idea->id }}</a></td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->created_at->toDateString('d m y //a//t') }}</td>
                                <td>
                                    <form action="/admin/comments/{{ $comment->id }}/delete" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="#" onclick="this.closest('form').submit();return false;">Delete</a>
                                        {{-- <button type="submit">delete</button> --}}
                                    </form>
                                    {{-- <a href="/ideas/{{ $comment->id }}/edit">edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>{{ $comments->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection()
