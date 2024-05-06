<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">TOP USERS : </h5>
    </div>

    <div class="card-body">
        @foreach ($topusers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="/users/{{ $user->id }}"><img style="width:40px" class="avatar-img rounded-circle"
                            src="{{ $user->getImageURL() }}" alt="{{ $user->name }}"></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="/users/{{ $user->id }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>

                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                        class="fa-solid fa-plus">
                    </i></a>
                {{-- @auth

                    @if (Auth::id() !== $user->id)
                        <div class="ms-auto">
                            @if (Auth::user()->follows($user))
                                <form method="POST" action="{{ route('users.unfollow', "$user->id") }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        class="btn btn-primary-soft rounded-circle icon-md ms-auto"> UnFollow </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('users.follow', "$user->id") }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        class="btn btn-primary-soft rounded-circle icon-md ms-auto"> Follow </button>
                                </form>
                            @endif

                        </div>
                    @endif @endauth --}}

            </div>
        @endforeach

    </div>
</div>
