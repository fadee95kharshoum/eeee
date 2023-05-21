<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('backend.sales.index', compact('sales'));
    }

    /**
     * Change Status of specified Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $card = Sale::findOrFail($id);
        if($card->status == false)
        {
            $card->update(['status'=> true]);
            return back()->with('success','Sale Status Is Active Now');
        }else{
            $card->update(['status'=> false]);
            return back()->with('success','Sale Status Is De-Active Now');
        }
        return back()->with('success', 'Something Rong');
    }

    /**
     * store sale request for user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validion
        $file = $request->hasFile('image');
        if ($file) {
            $path =  $this->uploadImage($request, 'screenshoots');
            $sale = Sale::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'discount_id'  =>$request->discount_id,
                'tr_nb' =>$request->transaction,
                'tr_img' =>$path
            ]);
            return back();
        }
    }
}
