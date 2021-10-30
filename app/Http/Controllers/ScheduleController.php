<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use App\Hospital;
use App\Day;

use App\Admin;
use Auth;
use Carbon\Carbon;

use Session;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:hospital');
    }

    public function index()
    {
        //find auth id
        $id = Auth::guard('hospital')->id();
        // get all  schedule from schedule database by id = hospital id
        $schedule = Schedule::where('hospital_id', $id)->get();

        return view('website.hospital.setSchedule',compact('schedule'));

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


     //   dd($request->date) ;
 // change or parse date by format
     $date = Carbon::parse($request->date)->format('m/d/Y');



        $paymentDate = $date;

      //  $day = Carbon::createFromFormat('d/m/Y', $paymentDate)->dayName;
      //  $tt=Carbon::createFromFormat('Y-m-d', $request->date)->format('d-m-Y');

        $timestamp = strtotime($date);
        $day = date('l', $timestamp);
        $todayDate = date('m/d/Y');

        $request->validate([
       'date' => 'after_or_equal:'.$todayDate,
        'NumOfAvailable' => 'required',
        'time' => 'required'

        ]);

        $id = Auth::guard('hospital')->id();
        $date2=Carbon::parse($request->date)->format('Y-m-d');



        $Schedule = new Schedule ;
        $Schedule->date = $date2 ;
           $Schedule->time =$request->time;
        $Schedule->NumOfAvailable=$request->NumOfAvailable ;
        $Schedule->day=$day ;
        $Schedule->hospital_id=$id ;
        $Schedule->save();




        Session::flash('success', 'schedule created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get id and get data from database
        $schedule= Schedule::find($id);
        // delete
        $schedule->delete();
            Session::flash('success','schedule deleted successfully');


        return redirect()->back();
    }
}
