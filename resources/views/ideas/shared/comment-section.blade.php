<hr>
<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @forelse ($idea->comments as $comment)
        @include('ideas.shared.comment')
    @empty
        <p class="text-center mt-4"> No Comments found ..</p>
    @endforelse

</div>
