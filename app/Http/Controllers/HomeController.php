<?php

namespace App\Http\Controllers;

use App\crime_record;
use App\Http\Requests;
use App\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Http\Requests\crime_record_request;
use App\Http\Requests\crime_record_request_update;
use App\User;
use App\Patrol;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){

            /**
             * Check if user is admin and return the admin page with its content
             */
            if(Auth::user()->is_admin()) {
                $user_count = User::get()->count();
                return view('auth.admin',compact('user_count'));
            }
            elseif (Auth::user()->is_recordManager()){
                /**
                 * Return view home for record manager
                 */
                $record_count = crime_record::get()->count();
                return view('home',compact('record_count'));
            }
            else{
                /**
                 * Return view welcome for normal user
                 */
                return view('welcome');
            }


        }

        /**
         * Return login view if user is logged out
         */
        return view('auth.login');
    }

    public function add_record(crime_record_request $request){
        //dd($request->all());
        crime_record::create(
            [
                'crime_type' => Marker::where('id', $request->crime_type)->first()->crime_type,
                'marker_id'  => $request->crime_type,
                'marker_color' => Marker::where('id', $request->crime_type)->first()->name,
                'offender_name' => $request->offender_name,
                'area_committed' => $request->area_committed,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'offender_id' => $request->offender_id,
                'time_committed' => $request->time_committed,

            ]
        );
        Session::flash('flash_message', 'crime record successfully added');
        return redirect()->back();
    }
    //sends data to delete records page
    public function record_management(){
        $records = crime_record::paginate(6);

        return view('appviews.RecordManagement.deleterecords' ,compact('records'));
    }
    public function maps(){

        $records = DB::table('crime_records')->get();
        return view('appviews.RecordManagement.maps',compact('records'));
    }

    public function markers(){
        $locations = crime_record::get(['area_committed','latitude', 'longitude', 'crime_type', 'time_committed','marker_color'])->toArray();

//       dd($locations);

        return response()->json(['data' => $locations]);
    }

    public function add(){
        $crime_types = DB::table('markers')->get();
        return view('appviews.RecordManagement.addrecords',compact('crime_types'));
    }
    //sends data to editrecords view
    public function update_records(){

        $records = crime_record::paginate(6);
        return view('appviews.RecordManagement.editrecords' ,compact('records'));
    }
    public function edit(Request $request, $id){

        $record = crime_record::find($id);
        $markers = Marker::get();
//        dd($record);
        return view('appviews.RecordManagement.editrecords_form', compact('record', 'markers'));
    }
    public function update(crime_record_request_update $request, $id){

        $record = crime_record::find($id);
        $record->update([
            'crime_type' => $request->crime_type,
            'offender_name' => $request->offender_name,
            'area_committed' => $request->area_committed,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'offender_id' => $request->offender_id,
            'time_committed' => $request->time_committed,

        ]);

        Session::flash('flash_message', 'crime record successfully updated');
        return redirect()->back();
    }

}
