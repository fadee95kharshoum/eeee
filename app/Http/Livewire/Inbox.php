<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Inbox extends Component
{
    public $messages = [];

    // public function mount(){
    //     //
    // }
    public function render()
    {
        return view('livewire.inbox');
    }

}
