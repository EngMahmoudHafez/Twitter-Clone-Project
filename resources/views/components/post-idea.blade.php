<h4> Share yours ideas </h4>
<div class="row">
    <form action="/ideas" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
