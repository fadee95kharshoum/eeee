<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Type;
use Livewire\Component;

class UserInterface extends Component
{
    public $cards;
    public $types;
    public $Type;
    public $selectedCardName;

    public $uploads;

    public $selectedCard;
    public $selectedType;

    protected $rules = [
        'card_id' => 'required|nubmer',
    ];
    public function mount(){
        $this->cards = Card::all();
        $this->types = collect();
    }

    public function updatedselectedCard($card_id){
        $this->types = Type::where('card_id', $card_id)->get();
        $this->selectedType = Null;
        $this->selectedCardName = Null;
        $this->Type = Null;
    }


    public function updatedselectedType($type_id){
        $this->Type = Type::findOrFail($type_id);
        $this->selectedCardName = $this->Type->card->name;
    }
    public function render()
    {
        return view('livewire.user-interface');
    }
}
