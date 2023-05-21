<?php

namespace App\Http\Livewire;

use App\Models\ForSale;
use App\Models\Message;
use App\Models\Method;
use App\Models\Payment;
use App\Models\Request;
use App\Models\Upload;
use App\Models\User;
use Livewire\Component;

class Counter extends Component
{

    public $users;
    public $cardsForSale;
    public $messages;
    public $payments;
    public $uploads;
    public $requests;
    public $methods;

    public function mount()
    {
        $this->users = User::count();
        // $this->cardsForSale = ForSale::count();
        $this->messages = Message::count();
        // $this->payments = Payment::count();
        $this->uploads = Upload::where('status', 'Pendding')->count();
        $this->requests = Request::where('status', 0)->count();
        // $this->methods = Method::count();
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
