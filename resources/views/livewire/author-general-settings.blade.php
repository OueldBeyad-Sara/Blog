<div>
    <form action="POST" wire:submit.prevent='updateGenaralSettings()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">
                        Blog name
                    </label>
                    <input type="text" class="form-control" placeholder="Enter blog name" wire:model='blog_name'>
                    <span class="text-danger">
                        @error('blog_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Blog Email
                    </label>
                    <input type="text" class="form-control" placeholder="Enter blog email" wire:model='blog_email'>
                    <span class="text-danger">
                        @error('blog_email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Blog description</label>
                    <textarea class="form control" id="" cols="63" rows="3" wire:model='blog_description'></textarea>
                    <span class="text-danger">
                        @error('blog_description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
</div>