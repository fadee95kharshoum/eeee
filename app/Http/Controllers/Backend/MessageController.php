<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Complaint;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('backend.messages.index', compact('messages'));
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
     * @param  \app\http\Requests\MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'case' => $request->case,
            'subject' => $request->subject,
        ]);
        return back();
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
        $message = Message::findOrFail($id);
        $message->delete();
        return back()->with('success', 'Message Deleted Successfuly');
    }

    public function storeMessage(MessageRequest $request)
    {
        try {
            $message = Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'case' => $request->case,
                'subject' => $request->subject,
            ]);
            return back()->with('success', 'Message Sent Successfuly');

        } catch (Exception  $e) {
            return back()->with('error', 'Message did not Send, Plz Enter Valid Info');
        }
    }
    public function showComplaintsForm(){

        return view('user.complaints');
    }

    public function updateStatusMessage(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update([
            'status' => $request->status,
        ]);

    }

    public function getOtherMessage($status)
    {
        $messages = Message::where('status', $status)->get();
        return view('backend.messages.index', compact('messages'));
    }



    public function chat(){


        return view('backend.chat.index');
    }
}
