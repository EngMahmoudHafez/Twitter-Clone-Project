<div>
    <form action="{{ route("ideas.comments.store",$idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @foreach ($idea->comments as $comment)
        <x-comment :comment="$comment"></x-comment>
    @endforeach

</div>
