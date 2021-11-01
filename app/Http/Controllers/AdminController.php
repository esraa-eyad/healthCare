<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Appointments;
use App\Hospital;
use App\User;
use App\Post;
use DB;
use App\Vaccine;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
use Session;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //can not access here expect admin
        $this->middleware('auth:admin');
    }
    public function index()
    {


        $count_hospital=Hospital::count();
        $count_post=Post::count();
        $count_User=User::count();

        $count_Appointments=Appointments::where('status',1)->count();


        $appointments_data = Appointments::where('status',1)->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('DAY(created_at) as day'),
            DB::raw('COUNT(status) as sum')

        )->groupBy('day')->get();


// show active hospital
        $best_hospital = Appointments::query()
            ->join('hospitals', 'hospitals.id', '=', 'appointments.hospital_id')
            ->selectRaw('hospitals.*, COUNT(appointments.hospital_id) AS more')
            ->groupBy(['appointments.hospital_id']) // should group by primary key
            ->orderByDesc('more')
            ->take(5) //
            ->get();


//show the more vaccine requried
        $most_vaccine = DB::table('vaccines')->join('appointments', 'vaccines.id', 'appointments.vaccine_id')
            ->selectRaw('vaccines.*, COUNT(appointments.vaccine_id) AS more')
            ->groupBy(['vaccines.id']) // should group by primary key
            ->orderByDesc('more')
            ->take(5) //
            ->get();
      //  dd($most_vaccine);
        //show the more vaccine requried
        $most = DB::table('vaccines')->join('appointments', 'vaccines.id', 'appointments.vaccine_id')
            ->selectRaw('vaccines.*, COUNT(appointments.vaccine_id) AS more')
            ->where('appointments.takeVaccine','=','1')

            ->groupBy(['vaccines.id']) // should group by primary key
            ->take(5) //
            ->get();

//show active hospital in post
        $posts = DB::table('posts')->join('hospitals', 'posts.hospital_id', 'hospitals.id')
            ->selectRaw('hospitals.*, COUNT(posts.hospital_id) AS more')
            ->groupBy(['hospitals.id']) // should group by primary key
            ->orderByDesc('more')
            ->take(5) // 20 best-selling products
            ->get();




        return view('admin',compact('count_User','count_Appointments','count_hospital','count_post','appointments_data','best_hospital','most_vaccine','posts','most'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin');

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
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);



        $request_data = $request->except(['password', 'password_confirmation']);
        $password=$request->passwoed;
        $request_data['password'] = bcrypt($request->password);


        $user = Admin::create($request_data);


        session()->flash('success', __('site.added_successfully'));

        return view('admin.user.index');

       // return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function show(Admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function profile(){
        $admin = \Auth::guard('admin')->user();



        return view('admin.user.profile', compact('admin'));
    }
    public function profile_update(Request $request){
        $admin = \Auth::guard('admin')->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $admin->id",
            'password' => 'sometimes|nullable|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->has('password') && $request->password !== null){
            $admin->password = bcrypt($request->password);
        }


        $admin->save();

        Session::flash('success', 'Admin profile updated successfully');
        return redirect()->back();
    }
    public function showAllHospitals()
    {
        //get all hospital order by created date
        $hospitals=Hospital::orderBy('created_at', 'desc')->paginate(10);

        // get all Appointments and realtions
       $appointments = Appointments::with(['hospitals', 'appointments_schedules'])->get();
        $hospital_vaccine = Vaccine::with(['hospitals'])->get();

           // dd($hospital_vaccine);
       return view('admin.hospitals.hospitals', compact(['hospitals','appointments','hospital_vaccine']));

    }

    public function showAllPosts()
    {
//get all posts and realtion with hospital order by created data
        $posts = Post::with(['hospital'])->orderBy('created_at', 'desc')->paginate(8);

      //    dd($posts);
        return view('admin.posts.posts', compact(['posts']));


    }
}
