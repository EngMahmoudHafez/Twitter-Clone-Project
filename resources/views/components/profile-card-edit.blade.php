<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class=" align-items-center justify-content-between">
            <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', " $user->id") }}">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center justify-content-between">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="Mario Avatar">
                    <div>
                        <label>Name</label>
                        <input value="{{ $user->name }}" name="name" type="text" class="form-control">
                        @error('name')
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        @auth
                            @if (Auth::id() == $user->id)
                                <a class="mx-2" href="/users/{{ $user->id }}">View</a>
                            @endif
                        @endauth

                    </div>
                </div>
                <div class="mt-4">
                    <label>Profile Picture</label>
                    <input name="image" class="form-control" type="file">
                    @error('image')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label>Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-dark mt-3">save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<hr>
