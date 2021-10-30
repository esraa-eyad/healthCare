<?php

namespace App\Http\Controllers;
use App\Hospital;
use App\Vaccine;
use Carbon\Carbon;
use App\Appointments;
use App\Schedule;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user()->id;

       // $appointments = Appointments::where('user_id', $user)->get();
        $appointments = Appointments::with(['hospitals', 'appointments_schedules','users'])->where('user_id',Auth::user()->id)->get();


      //  dd($appointments);
        return view('website.user.appointment.index',compact('appointments'));

    }
    public function MarkAsRead_all (Request $request)

    {

        $userUnreadNotification= Auth::user()->unreadNotifications;



        if($userUnreadNotification) {

            $userUnreadNotification->markAsRead();

            return back();

        }





    }


    public function subCat(Request $request)
    {

        $parent_id = $request->cat_id;


        $subcategories= DB::table('vaccines')
            ->select('vaccines.*')
            ->where('vaccines.hospital_id', 'LIKE', $parent_id)
            ->Where('vaccines.numOfVaccine', '!=', 0)
            ->get();


        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
    public function subDay(Request $request)
    {
        $parent_id = $request->cat_id;

        $subcategories = DB::table('schedules')
            ->select('schedules.*')
            ->where('schedules.hospital_id', 'LIKE', $parent_id)
            ->where('schedules.NumOfAvailable', '<>', 0)
            ->where('schedules.expire','=','0')
            ->orderBy('schedules.date', 'ASC')


            ->groupBy('schedules.day')
            ->distinct()
           ->get();

      //  $subcategories = Schedule::with(['hospitals_schedule'])->where('hospital_id', '=', $parent_id)->get();


        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
    public function subDate(Request $request)
    {
        $day = $request->day;
       $daynew = Schedule::where('id', $day)->value('day');
        $date = Schedule::where('id', $day)->value('date');
        $id = $request->name;

        $subcategories = DB::table('schedules')
            ->select('schedules.*')
            ->where('schedules.expire','=','0')
            ->where('schedules.NumOfAvailable','<>', 0)

            ->where('schedules.hospital_id', 'LIKE', $id)
            ->where('schedules.day', 'LIKE', $daynew)
            ->Orwhere('schedules.date', 'LIKE', $date)


            ->get();

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospital=  Hospital::with(['schedules','vaccines'])->get();

        return view('website.user.appointment.create',compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = auth()->user()->id;

        $id = $request->date;
        $request->validate([

            'day' => 'required',
            'date' => 'required',
            'category_id' => 'required',
            'subcategories_id' => 'required',
        ]);
        $vaccine_id = $request->subcategories_id;

        $schedules_id = $request->day;

        $appointment = Appointments::create([

            'hospital_id' => $request->category_id,
            'user_id' => $user,
            'vaccine_id' => $vaccine_id,
            'schedules_id' => $schedules_id,


        ]);
        $appointment->save();
        if ($appointment->save()) {
            $subcategories = DB::table('schedules')->where('id', $schedules_id)->value('NumOfAvailable');

            $newNUm = $subcategories - 1;

            $updateNum = Schedule::find($schedules_id);

                $updateNum->NumOfAvailable = $newNUm;
                $updateNum->save();
            }





        if ($appointment->save()) {
            $subcategories = DB::table('vaccines')->where('id', $vaccine_id)->value('numOfVaccine');
            $newNUm = $subcategories - 1;

            $updateNum = Vaccine::find($vaccine_id);

            if ($updateNum) {
                $updateNum->numOfVaccine = $newNUm;
                $updateNum->save();
            }


            Session::flash('success', 'Appointments created successfully');
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointments $appointments)
    {

    }
}
