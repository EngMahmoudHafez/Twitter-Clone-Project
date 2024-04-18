<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="/ideas/{{ $idea->id }}" method="post">
                    @method('delete')
                    @csrf
                    <a class="mx-2" href="/ideas/{{ $idea->id }}/edit" >Edit</a>
                    <a href="/ideas/{{ $idea->id }}">view</a>
                    <button class="btn btn-danger btn-sm"> X </button>
                </form>

            </div>
        </div>
    </div>

    <div class="card-body">
        @if($editing ?? false)
            <form action="/ideas/{{ $idea->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">

                    <h5>the old contnet</h5>
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p><hr>
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
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->format('d M Y \a\t g:i a') }} </span>
            </div>
        </div>
        <hr><hr>
        <x-comment-section :comments="$idea->comments" :idea="$idea"></x-comment-section>
        @endif
    </div>
</div>

