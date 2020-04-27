<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PostCreate extends Component
{
    public $title;
    public $body;

    public function addPost()
    {
        $this->validateFields();

        $post = auth()->user()->posts()->create([
            'title' => $this->title,
            'description' => $this->body
        ]);
        $this->emit('postAdded', $post->id);
        Session::flash('success', 'Post was added successfully');
        $this->resetFormFields();
    }

    public function render()
    {
        return view('livewire.post-create');
    }

    protected function resetFormFields()
    {
        $this->title = '';
        $this->body = '';
    }

    protected function validateFields()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
