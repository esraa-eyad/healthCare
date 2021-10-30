<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;

use App\Message;
use Illuminate\Http\Request;
use App\Hospital;
use Auth;
use App\User;


use Session;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= auth()->user()->id;

        $messages= Message::with(['hospitals','users'])->where('sender_id', $id)->get();
        return view('website.user.message.index',compact('messages'));

    }

    public function indexForHospital()
    {
        $id = Auth::guard('hospital')->id();


        $messages= Message::where('reciever_id', $id)->get();

        return view('website.hospital.message.index',compact('messages','id'));

    }
    public function showForReplay($id ,Request $request)
    {
        $message=  Message::find($id);

        return view('website.hospital.message.show',compact('message'));

    }
    public function ReadNotification(Request $request)
    {
        $userUnreadNotification = Auth::guard('hospital')->user()
            ->unreadNotifications
            ->where('id', $request->id)
            ->first();

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function ReadNotification2(Request $request)
    {
        $userUnreadNotification = Auth::user()
            ->unreadNotifications
            ->where('id', $request->id)
            ->first();

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function replay(Request $request)
    {
        $id= $request->id;

        $messages= Message::find($id);

        $messages->replay = $request->replay;
        $messages->save();
        Session::flash('success', 'message created successfully');
        return redirect()->back();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;

        $hospitals=Hospital::all();
        return view('website.user.message.create',compact('hospitals','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'reciever_id' => 'required',

            'message' => 'required',


        ]);
        $sender_id = $request->sender_id ;


        $message = message::create([
            'sender_id'=> $sender_id ,
            'message' => $request->message  ,

            'reciever_id' => $request->reciever_id ,


        ]);
        $message->save();
       // $uu= $message->reciever_id ;

        $messagenew =message::latest()->first();
        $reciever_id= $messagenew->reciever_id ;


        $user = hospital::where('id',$reciever_id)->get();
        Notification::send($user, new \App\Notifications\NewMessage($messagenew));

        Session::flash('success', 'message created successfully');
        return redirect()->back();
    }
    public function MarkAsRead_all (Request $request)
    {
        $userUnreadNotification= Auth::guard('hospital')->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $message=  Message::find($id);




        return view('website.user.message.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
