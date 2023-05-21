<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\ForSale;
use App\Models\Landing;
use App\Models\Method;
use App\Models\Payment;
use App\Models\Upload;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $video = Landing::where('section', 'slide_video')->first();
        $images = Landing::where('section', 'slide_image')->get();
        $headSecondSecion = Landing::where('section', 'head')->first();
        $bodyOfSecondSection = Landing::where('section', 'services')->get();
        $discount = Landing::where('section', 'discount')->first();
        $cardsForSale = ForSale::where('status', '1')->get();
        return view('index', compact('video', 'images', 'headSecondSecion', 'bodyOfSecondSection', 'discount', 'cardsForSale'));
    }

    public function isAdmin()
    {
        return view('backend.index');
    }

    public function isUser()
    {
        $countPenddingUploadedCards = Upload::where('user_id', auth()->user()->id)->get();
        $methods = Method::where('status', 1)->get();
        
        return view('user.index', compact('methods', 'countPenddingUploadedCards'));
    }

    public function buyCard($id)
    {
        $card = ForSale::findOrFail($id);
        $discounts =  $card->discounts;
        return view('buy', compact('card', 'discounts'));
    }

    public function getTransectionNumber(Request $request)
    {
        $tr = Payment::findOrFail($request->country_id);
        return response()->json($tr);
    }

}
