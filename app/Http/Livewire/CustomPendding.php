<?php

namespace App\Http\Livewire;

use App\Models\Custom;
use Livewire\Component;

class CustomPendding extends Component
{
    public $customCards;

    public function mount(){
        $this->customCards = Custom::all();
    }
    public function render()
    {
        return view('livewire.custom-pendding');
    }
}
