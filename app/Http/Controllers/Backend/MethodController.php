<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Method::all();
        return view('backend.methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MethodRequest $request)
    {
        try {
            $method = Method::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
            if($method){
                return redirect()->route('methods.index')->with('success', 'Method Has Been Added Successfuly');
            }
        } catch (\Throwable $th) {
            return redirect()->route('methods.index')->with('success', 'Something Rong');
        }
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
        $method = Method::findOrFail($id);
        return view('backend.methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MethodRequest $request, $id)
    {
        $method = Method::findOrFail($id);
        $method->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->route('methods.index')->with('success', 'Method Has Been Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = Method::findOrFail($id);
        $method->delete();
        return back()->with('success', 'Method Has Been Updated Successfuly');
    }

    /**
     * Change Status of specified Method.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $card = Method::findOrFail($id);
        if($card->status == false)
        {
            $card->update(['status'=> true]);
            return back()->with('success','Method Status Is Active Now');
        }else{
            $card->update(['status'=> false]);
            return back()->with('success','Method Status Is De-Active Now');
        }
        return back()->with('success', 'Something Rong');
    }
}
