<div>
    <a href="#" data-toggle="modal" data-target="#delete{{$post->id}}" class="text-decoration-none">x</a>

    <div class="modal" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="deletePost">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete {{$post->title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <b>{{ $post->title }}</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Proceed</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
