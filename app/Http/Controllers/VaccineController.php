<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Vaccine;
use App\Hospital;
use DB;

use Auth;
use Session;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:hospital')->except('ShowVaccine');

    }
    public function index()
    {

        $id = Auth::guard('hospital')->id();
     //   $hospital = Hospital::where('id', $id)->first();

        $hospital_vaccine = Vaccine::with(['hospitals'])->where('hospital_id',$id)->get();




        return view('website.hospital.vaccine.index',compact('hospital_vaccine'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.hospital.vaccine.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::guard('hospital')->id();;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'numOfVaccine' => 'required|integer|',
        ]);

        Vaccine::create([
            'name' => $request->name,
            'numOfVaccine' => $request->numOfVaccine,
            'hospital_id' => $id,

        ]);




        Session::flash('success', 'Vaccine created successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vaccine = Vaccine::all();

        //vaccines

        if ($request->search) {

            $vaccine = DB::table('vaccines')->join('hospitals', 'vaccines.hospital_id', 'hospitals.id')
                ->select('vaccines.*', 'hospitals.nameOfHospital')
                ->where('hospitals.nameOfHospital', 'LIKE', "%{$request->search}%")
                ->orWhere('vaccines.name', 'LIKE', "%{$request->search}%")
                ->get();
        }


        return view('website.user.showVaccine', compact('vaccine'));
    }
    public function ShowVaccine(Request $request)
    {
     $vaccine = Vaccine::all();

        //vaccines

               if($request->search) {

                   $vaccine= DB::table('vaccines')->join('hospitals', 'vaccines.hospital_id', 'hospitals.id')
                       ->select('vaccines.*','hospitals.nameOfHospital')
                       ->where('hospitals.nameOfHospital', 'LIKE', "%{$request->search}%")
                       ->orWhere('vaccines.name', 'LIKE', "%{$request->search}%")
                       ->get();
               }


  return view('website.user.showVaccine',compact('vaccine'));


    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccine = Vaccine::find($id);



        return view('website.hospital.vaccine.edit',compact('vaccine'));

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
        $vaccine= Vaccine::find($id);
        $id = Auth::guard('hospital')->id();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'numOfVaccine' => 'required|integer|',
        ]);




        $vaccine->name = $request->name;

        $vaccine->numOfVaccine = $request->numOfVaccine;


        $vaccine->save();
      //  $vaccine->update($request);


        Session::flash('success', 'Vaccine update successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccine= Vaccine::find($id);
        $vaccine->delete();

        Session::flash('success', 'Vaccine deleted successfully');
        return redirect()->back();

    }
}
