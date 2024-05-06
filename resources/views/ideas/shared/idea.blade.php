<div class="card mt-4 ">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="/users/{{ $idea->user_id }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @can('update', $idea)
                    <form action="/ideas/{{ $idea->id }}" method="post">
                        @method('delete')
                        @csrf
                        <a class="mx-2" href="/ideas/{{ $idea->id }}/edit">Edit</a>
                        <a href="/ideas/{{ $idea->id }}">view</a>
                        <button class="btn btn-danger btn-sm"> X </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-body">
        @if ($editing ?? false)
            <form action="/ideas/{{ $idea->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">

                    <h5>the old contnet</h5>
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
                    <hr>
                    <h5>enter the new contnet</h5>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    @error('content')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>

            <div class="d-flex justify-content-between">
                @include('ideas.shared.like-button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->format('d M Y \a\t g:i a') }} </span>
                </div>
            </div>

            @include('ideas.shared.comment-section')
        @endif
    </div>
</div>
