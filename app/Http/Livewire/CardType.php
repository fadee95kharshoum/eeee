<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Type;
use App\Models\Upload;
use Livewire\Component;

class CardType extends Component
{
    public $cards;

    
    public $types;
    public $uploads;

    public $selectedCard;
    public $selectedType;


    public function mount(){
        $this->cards = Card::all();
        $this->types = collect();
    }
    public function render()
    {
        return view('livewire.card-type');
    }

    public function updatedselectedCard($card_id){
        $this->types = Type::where('card_id', $card_id)->get();
        $this->selectedType = Null;
    }


    public function search($type_id, $status)
    {
        $this->uploads = Upload::where('type_id', $type_id)->where('status', $status)->get();
    }
}
