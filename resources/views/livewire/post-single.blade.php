<div class="media mb-3">
    <img src="{{$post->user->avatar()}}" class="mr-3 rounded-circle" style="width: 50px;">

    <div class="media-body">
        <h5 class="mt-0">{{$post->user->name}}</h5>
        <h6><b>Title :</b> {{$post->title}}</h6>
        <b>Description :</b> {{$post->description}}
    </div>

    <livewire:post-delete :post="$post" :key="$post->id"/>
</div>
