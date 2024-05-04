<div class="col-6">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            {{ session('danger') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-post-idea></x-post-idea>
    <hr>

    @forelse ($ideas as $idea)
        <x-idea :idea="$idea"></x-idea>
    @empty
        <h4> NO posts found</h4>
    @endforelse
    {{ $ideas->withQueryString()->links() }}
</div>
