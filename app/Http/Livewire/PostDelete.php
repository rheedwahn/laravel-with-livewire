<?php

namespace App\Http\Livewire;

use App\models\Post;
use Livewire\Component;

class PostDelete extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function deletePost()
    {
        Post::where('id', $this->post->id)->first()->delete();
        $this->emit('postDeleted');
    }

    public function render()
    {
        return view('livewire.post-delete');
    }
}
