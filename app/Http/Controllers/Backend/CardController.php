<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('backend.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\CardRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        try {
            $card = Card::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
            if($card){
                return redirect()->route('cards.index')->with('success','Card Added Successfuly');
            }
        }catch (\Throwable $th) {
            return redirect()->route('cards.index')->with('success', 'Something Rong');
        }

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('backend.types.index', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::findOrFail($id);
        return view('backend.cards.edit', compact('card'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Http\Requests\CardRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        $card->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->route('cards.index')->with('success', 'Card Updated Successfuly');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Card::findOrFail($id)->delete();
        return back()->with('success','Card Deleted Successfuly');
    }

    /**
     * Change Status of specified Card.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $card = Card::findOrFail($id);
        if($card->status == false)
        {
            Card::findOrFail($id)->update(['status'=> true]);
            return back()->with('success','Card Status Is Active Now');
        }else{
            Card::findOrFail($id)->update(['status'=> false]);
            return back()->with('success','Card Status Is De Active Now');
        }
        return back()->with('success', 'Something Rong');
    }
}
