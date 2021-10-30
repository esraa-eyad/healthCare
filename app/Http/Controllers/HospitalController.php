<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Hospital;
use Illuminate\Http\Request;
use App\Admin;
use App\Answers;
use App\User;

use Auth;
use App\Post;
use Carbon\Carbon;
use App\Appointments;
use App\Schedule;
use DB;
use App\Vaccine;
use Session;


class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:hospital')->except('showQr');;
    }

    public function home()
    {
        $id = Auth::guard('hospital')->user()->id;

        $count_Appointments=Appointments::where('hospital_id',$id)->count();

        $count_post=Post::where('hospital_id',$id)->count();


        return view('website.hospital.Home',compact('count_Appointments','count_post'));
    }
    public function index(Request $request)
    {


        $user = Auth::guard('hospital')->user()->id;
        $appointments = Appointments::with(['hospitals', 'appointments_schedules','users'])->where('hospital_id', $user)->where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {

            return $query->where('identity', 'like', '%' . $request->search . '%');


        });

    })->latest()->paginate(5);

       // dd($appointments);

        return view('website.hospital.appointment.index',compact('appointments'));

    }
    public function showSure(Request $request)
    {


        $user = Auth::guard('hospital')->user()->id;
        $appointments = Appointments::with(['hospitals', 'appointments_schedules'])->where('hospital_id', $user)->where('status', 1)->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('identity', 'like', '%' . $request->search . '%');


            });

        })->latest()->paginate(5);

        return view('website.hospital.appointment.showSure',compact('appointments'));

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


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_hospital = Auth::guard('hospital')->id();

        $hospital_vaccine = Vaccine::where('hospital_id', $id_hospital)->get();;
        $appointment = Appointments::with(['hospitals', 'appointments_schedules','users','vaccine'])->where('id',$id)->get();
        $user_id = Appointments::where('id', $id)->value('user_id');
        $answers = Answers::with(['questions', 'users'])->where('user_id', $user_id)->get();


       //dd($appointment);
        return view('website.hospital.appointment.show',compact('appointment','hospital_vaccine','answers'));


    }
    public function createQrCode($qrCodeData  )
{

//This is code connert data to QR
        $qrcodeimagename = '/'.uniqid().'-' .time().'-'.uniqid().'-'. '.png';
        $qrCodePath = public_path().$qrcodeimagename;

        $createQrcode =  \QRCode::text($qrCodeData)->setSize(6)->setOutfile($qrCodePath)->png();

        $qrcode = str_replace("public/", "",$qrCodePath);
        //  $url= public_path()/qrCode;



        //return $qrcode;
        return $qrcodeimagename;

 }
    public function takeVaccine(Request $request)
    {
        $appointment = Appointments::with(['vaccine'])->find($request->appointment_id);
        $appointment->takeVaccine = $request->takeVaccine;
        if($appointment->save()){

            $id =$appointment->vaccine->id;
            $number= DB::table('vaccines')->where('id', $id)->value('numOfVaccine');
            $newNum = $number - 1;

             DB::table('vaccines')
                ->where('id', $id)
                ->update(array('numOfVaccine'=>$newNum));

        }

        return response()->json(['success'=>'Status change successfully.']);
    }


    public function createQr(Request $request)
    {

        $appointment = Appointments::find($request->appointment_id);
        $id = Appointments::find($request->appointment_id)->user_id;

        $user = User::where('id',$id)->get();
        $status=$request->status;





        $id = Appointments::find($request->appointment_id)->id;


        if($status==1) {
            // dd($id);
            $url='http://127.0.0.1:8000/qrCode/'.$id;

            $qrCodeDataNew= $this->createQrCode( $url);

            $appointment->qrcode = $qrCodeDataNew;
            $appointment->status = $request->status;

            $appointment->save();
            Notification::send($user, new \App\Notifications\changeStatus($appointment));
            Session::flash('success', 'Appointments updated successfully   Created QR ');
            return redirect()->back();
        }

        if($status==0) {
            $appointment->status = $request->status;

            $appointment->save();
            Notification::send($user, new \App\Notifications\disapproval($appointment));
            Session::flash('success', 'Appointments updated successfully');
            return redirect()->back();
        }




    }
    public function showQr($id)
    {
//here show inf after scan QR
        $appointment = Appointments::findOrFail($id);


        return  view('website.hospital.appointment.qrCode',compact('appointment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
    public function profile(){

        $user = Auth::guard('hospital')->user();

 return view('website.hospital.updateProfile',compact('user'));
    }
    public function profile_update(Request $request){
        $user = Auth::guard('hospital')->user();

        $this->validate($request, [
            'nameOfHospital' => 'required|string|max:255',
            'mobile' => 'required|string|max:10',

            'email' => "required|email|unique:hospitals,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
        ]);

        $user->nameOfHospital = $request->nameOfHospital;
        $user->mobile = $request->mobile;
        $user->email = $request->email;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }


        $user->save();

        Session::flash('success', 'User profile updated successfully');
        return redirect()->back();
    }
}
