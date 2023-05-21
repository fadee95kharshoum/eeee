<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $type = Type::create([
            'name' => $request->name,
            'daily_price' => $request->daily_price,
            'placeholder' => $request->placeholder,
            'status' => $request->status,
            'card_id' => $request->card_id,
        ]);
        return back()->with('success', 'Type Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('backend.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $type = Type::findOrFail($id);
        $type->update([
            'name' => $request->name,
            'daily_price' => $request->daily_price,
            'placeholder' => $request->placeholder,
            'status' => $request->status,
            'card_id' => $request->card_id,
        ]);
        return redirect()->route('cards.show', $request->card_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        if($type->uploads || $type->customs)
        {
            return back()->with('success', 'Please Just Deactive Status Or Delete All Uploaded & Customs Cards And Then Delete This Type');
        }else{
            $type->delete();
            return back()->with('success', 'Type Deleted Successfuly');
        }
    }

    public function changeStatus($id)
    {
        $type = Type::findOrFail($id);
        if($type->status == false)
        {
            $type->update(['status'=> true]);
            return back()->with('success','Type Status Is Active Now');
        }else{
            $type->update(['status'=> false]);
            return back()->with('success','Type Status Is De Active Now');
        }
        return back()->with('success', 'Something Rong');
    }
}
