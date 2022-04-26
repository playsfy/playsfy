<?php

namespace App\Http\Livewire\Album;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Album;
use Auth;

class AlbumList extends Component
{
    use WithPagination;

    public $search, $albums, $userid, $user;

    public function mount()     
    {
        $this->user = User::where('id', $this->userid)->first(); 
        $this->albums = Album::where('user_id', $this->userid)->get();
    }
    public function render()
    {
        if ($this->search != "") {
            //$this->queues = Queue::where([['user_id', '=', $this->userid], ['name', 'LIKE', '%'.$this->search.'%']])->get();
            $this->albums = [];
        }
        else {
            //$this->queues = Queue::where('user_id', $this->userid)->get();
            $this->albums = Album::where('user_id', $this->userid)->get();
        } 
        return view('livewire.album.album-list');
    }
}
