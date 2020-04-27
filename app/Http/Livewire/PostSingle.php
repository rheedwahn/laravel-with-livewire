<?php

namespace App\Http\Livewire;

use App\models\Post;
use Livewire\Component;

class PostSingle extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post-single');
    }
}
