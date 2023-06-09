<div>
    <div class="row row-cards">
        @forelse ($posts as $post)
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="card">
                <img src="/storage/images/post_images/{{$post->featured_image}}" alt="" class="card-img-top">
                <div class="card-body p-2">
                    <h3 class="m-0 mb-1">{{ $post->post_title }}</h3>
                </div>
                <div class="d-flex">
                    <a href="" wire:click.prevent='deletePost({{$post->id}})' class="card-btn">Delete</a>
                </div>
            </div>
        </div>
        @empty
            <span class="text-danger">No post(s) found</span>
        @endforelse
    </div>
</div>
