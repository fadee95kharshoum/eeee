<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('backend.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::create([
            'name' => $request->name,
            'number' => $request->number,
            'status' => $request->status
        ]);
        return redirect()->route('payments.index')->with('success', 'Payment Method Has Been Added Successfuly');
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
        $payment = Payment::findOrFail($id);
        return view('backend.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update([
            'name' => $request->name,
            'number' => $request->number,
            'status' => $request->status
        ]);
        return redirect()->route('payments.index')->with('success', 'Payment Method Has Been Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();
        return back()->with('success', 'Payment Has Been Deleted Successfuly');
    }

    public function changeStatus($id)
    {
        $payment = Payment::findOrFail($id);
        if($payment->status == false)
        {
            $payment->update([
                'status' => true
            ]);
            return back()->with('success', 'Payment Method Has Been Update Status For Active Successfuly');
        }else{
            $payment->update([
                'status' => false
            ]);
            return back()->with('success', 'Payment Method Has Been Update Status For UnActive Successfuly');
        }
    }
}
