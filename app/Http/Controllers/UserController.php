<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use App\Question;
use App\Answers;
use App\Hospital;
use App\Vaccine;

use App\Appointments;
use App\Schedule;
use Illuminate\Http\Request;
use Auth;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // $appointments = Appointments::where('user_id', $user)->get();
        $appointments = Appointments::with(['hospitals', 'appointments_schedules','users'])->where('user_id',Auth::user()->id)->get();

        return view('website.user.Home',compact(['appointments','user']));

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
        //
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

    public function profile(){
      $user = Auth()->user();


        //$appointments = Answers::with(['questions','users'])->where('user_id',Auth::user()->id)->get();

      //  dd($appointments);

        return view('website.user.updateProfile',compact('user'));
    }
    public function profile_update(Request $request){
        $user = Auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'identity' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->identity = $request->identity;

        $user->email = $request->email;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }


        $user->save();

        Session::flash('success', 'User profile updated successfully');
        return redirect()->back();
    }
}
