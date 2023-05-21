<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForSaleRequest;
use App\Models\ForSale;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Traits\UploadImageTrait;
use Exception;

class ForSaleController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = ForSale::all();
        return view('backend.for_sales.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.for_sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\http\Requests\ForSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForSaleRequest $request)
    {
        $file = $request->hasFile('image');
        if ($file) {
            $path =  $this->uploadImage($request, 'CardForSale');
            if($path)
            {
                ForSale::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'path' => $path,
                    'status' => $request->status
                ]);
                return redirect()->route('cards-for-sale.index')->with('success', 'Card Added Successfuly');
            }
            return redirect()->route('cards-for-sale.index')->with('success', 'Card Didnot added');
        }
        return redirect()->route('cards-for-sale.index')->with('success', 'Card Didnot Added, Something Rong');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $for_sale = ForSale::findOrFail($id);
        $payments = Payment::where('status', 1)->get();
        return view('backend.for_sales.show', compact('for_sale', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = ForSale::findOrFail($id);
        return view('backend.for_sales.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\http\Requests\ForSaleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForSaleRequest $request, $id)
    {
        $file = $request->hasFile('image');
        if ($file) {
            $path =  $this->uploadImage($request, 'forSales');
            ForSale::create([
                'name' => $request->name,
                'description' => $request->description,
                'path' => $path,
                'status' => $request->status
            ]);
            return back()->with('success', 'Card Update Successfuly');
        } else {
            return back()->with('success', 'Card Didnot Update, Something Rong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $card = ForSale::findOrFail($id);
            $card->delete();
        } catch (Exception $th) {
            return back()->with('success', 'There is Discounts Realted with This Card');
        }
        return back()->with('success', 'Card Deleted Successfuly');

    }

    /**
     * Change Status of specified Card.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $card = ForSale::findOrFail($id);
        if($card->status == false)
        {
            $card->update(['status'=> true]);
            return back()->with('success','Card Status Is Active Now');
        }else{
            $card->update(['status'=> false]);
            return back()->with('success','Card Status Is De-Active Now');
        }
        return back()->with('success', 'Something Rong');
    }

}
