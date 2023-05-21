<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Custom;
use App\Models\Type;
use App\Models\Upload;
use Exception;
use Illuminate\Http\Request;

//for encryption
use Illuminate\Support\Facades\Crypt;
//for encryption

class UploadController extends Controller
{

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
        try {
        //For All
        $card = Card::findOrFail($request->card_id);
        $type = Type::findOrFail($request->type_id);
        $userId = auth()->user()->id;
        $value_from_user = $request->value;



        if ($type->name == 'custom') {
            //الصفات المشتركة مثل سعر النوع
            $price_from_type = $type->daily_price;

            if (is_numeric($request->value_from_user)) {

            switch ($card->name) {
                case 'Paypal':

                    Custom::create([
                        'card_id' => $card->id,
                        'type_id' => $type->id,
                        'user_id' => $userId,
                        'value' => $value_from_user,

                        'price' => ($price_from_type*$value_from_user),
                        'email' => $request->email,
                        'link' => $request->link,
                    ]);
                    break;
                case 'USDT':
                    Custom::create([
                        'card_id' => $card->id,
                        'type_id' => $type->id,
                        'user_id' => $userId,
                        'value' => $value_from_user,

                        'price' => $price_from_type*$value_from_user,
                        'path' => $request->path,
                        'transaction_number' => $request->transaction_number,
                    ]);
                    break;
                case 'Payyer':
                    Custom::create([
                        'card_id' => $card->id,
                        'type_id' => $type->id,
                        'user_id' => $userId,
                        'value' => $value_from_user,

                        'price' => $price_from_type*$value_from_user,
                        'path' => $request->path,
                        'transaction_number' => $request->transaction_number,
                    ]);
                    break;
                default:
                    // for coustom
                    $price_custom_from_user = $request->custom;
                    Upload::create([
                        'value' => $request->value,
                        'custom' => $price_custom_from_user,

                        'price' => ($price_custom_from_user*$price_from_type),
                        'type_id' => $type->id,
                        'user_id' => $userId,
                    ]);
                    break;
            }
        }else{
            return back()->with('error', 'Please Enter Valid Input Or You Will be Blocked');
        }
            return back()->with('تم إرسال البطاقة بنجاح');
        } else {
            $type_name = $type->name;
            $type_price = $type->daily_price;
            $number_of_count = count($array = preg_split("/\r\n|\n|\r/", $request->value));
            $values = preg_split("/\r\n|\n|\r/", $request->value);
            for ($i = 0; $i < $number_of_count; $i++) {
                Upload::create([
                    'value' => $values[$i],
                    // 'value' => Crypt::encryptString($values[$i]),
                    'price' => ($type_name*$type_price),
                    'type_id' => $request->type_id,
                    'user_id' => auth()->user()->id
                ]);
        }
            return back();
        }
        return back();
    } catch (Exception $th) {
        return back()->with('error', 'SomeThing Wrong, Please Enter Valid input');
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
        //
    }

    // public function search(Request $request)
    // {
    //     return $request;
    // }
}
