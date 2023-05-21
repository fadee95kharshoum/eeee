<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Discount;
use App\Models\ForSale;
use Illuminate\Http\Request;
use Exception;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        try {
            $discount = Discount::create([
                'discount' => $request->discount,
                'price' => $request->price,
                'payment_id' => $request->payment_id,
                'for_sale_id' => $request->card_for_sale
            ]);
        } catch (Exception $e) {
            return back()->with('success', 'There is somthing Rong');
        }
        return back()->with('success', 'تم اضافة عرض الخصم بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $discount = Discount::findOrFail($id);
            $discount->delete();
            return back()->with('success', 'تم الحذف بنجاح');

        } catch (\Throwable $th) {
            return back()->with('success', 'لم يتم الحذف بسبب وجود شخص قد طلب هذا الخصم');

        }
    }
}
