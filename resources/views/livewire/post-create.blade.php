<div class="m4-4">
    <form wire:submit.prevent="addPost">
        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" wire:model="title">

            @error('title')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">
                Body
            </label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" wire:model="body">Body</textarea>
            @error('body')
            <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Post</button>

    </form>
</div>
