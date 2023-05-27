<div>
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          <form wire:submit.prevent='LoginHandler()' method="post" autocomplete="off" novalidate="">
            <div class="mb-3">
              <label class="form-label">Email or Username</label>
              <input type="text" class="form-control" placeholder="Enter email or username" autocomplete="off" wire:model='login_id'>
              @error('login_id')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                <span class="form-label-description">
                  <a href="{{  route('author.forgot-password') }}">I forgot password</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Your password" autocomplete="off" wire:model='password'>
              </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </form>
        </div>
      </div>
</div>
