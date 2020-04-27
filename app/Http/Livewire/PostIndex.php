<?php

namespace App\Http\Livewire;

use App\models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $listeners = [
        'postAdded', 'postDeleted'
    ];

    public function postAdded($postId)
    {
        session()->flash('success', 'Your post was added');
    }

    public function postDeleted()
    {
        session()->flash('success', 'Your post was deleted');
    }

    public function render()
    {
        $posts = Post::latest()->paginate(3);
        return view('livewire.post-index', ['posts' => $posts]);
    }
}
