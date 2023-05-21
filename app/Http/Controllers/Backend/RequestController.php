<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetMoneyRequest;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestModel::all();
        return view('backend.requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.requests.create');
    }

    /**
     * Store a newly created resource in storage. GetMoneyRequest
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRequestFromUser(GetMoneyRequest $request)
    {
        try {
            // حسب المشكلة حط الرسالة
            //get balance of user
            $user_balance = auth()->user()->balance;
            // user request money
            $user_request_money = $request->money;
            //check request money less than his balance.
            if($user_balance > $user_request_money){
                //check sum of requests money less than his balance.
                $sum = RequestModel::where('user_id', auth()->user()->id)->sum('money');
                if($sum + $user_request_money < $user_balance){
                    $request_created = RequestModel::create([
                        'money' => $user_request_money,
                        'country' => $request->country,
                        'place_for_delivery' => $request->place_for_delivery,
                        'user_id' => auth()->user()->id,
                        'method_id' => $request->method_id,
                        'phone' => $request->phone,
                    ]);
                    if($request_created)
                    {
                        return back()->with('success', 'تم تسجيل طلبك بنجاح');
                    }else{
                        return back()->with('error', 'لم يتم تسجيل طلبك بنجاح حاول مرة أخرى');
                    }
                }else{
                    return back()->with('error', 'لم يتم تسجيل طلبك بنجاح حاول مرة أخرى');
                }
            }else{
                return back()->with('error', 'لم يتم تسجيل طلبك بنجاح حاول مرة أخرى');
            }

        } catch (\Throwable $th) {
            return back()->with('error', 'لم يتم تسجيل طلبك بنجاح حاول مرة أخرى');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = RequestModel::FindOrFaol($id);
        $request->delete();
        return back()->with('success', 'Request Deleted Successfuly');
    }

            /**
     * Change Status of specified Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $card = RequestModel::findOrFail($id);
        if($card->status == false)
        {
            $card->update(['status'=> true]);
            return back()->with('success','Request Status Is Active Now');
        }else{
            $card->update(['status'=> false]);
            return back()->with('success','Request Status Is De-Active Now');
        }
        return back()->with('success', 'Something Rong');
    }


}
