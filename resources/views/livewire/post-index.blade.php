<div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <livewire:post-create/>
    <hr>
    @if($posts->count())
        @foreach($posts as $post)
            <livewire:post-single :post="$post" :key="$post->id"/>
        @endforeach
    @else
        <p class="text-center">You don't posts</p>
    @endif
    {{$posts->links()}}
</div>
