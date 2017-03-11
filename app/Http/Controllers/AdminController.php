<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use App\Patrol;
use App\Police;
use App\Http\Requests\RegisterUserRequestUpdate;
use App\Http\Requests\PatrolRequest;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\RegisterUserRequest;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function view_users_delete(){
        $users = User::paginate(6);

        return view('appviews.admin.DeleteUser' ,compact('users'));
    }

    public function view_users_update(){
        $users = User::paginate(6);

        return view('appviews.admin.UpdateUser' ,compact('users', 'user_count'));
    }
    public function search_view(){
        $users = User::paginate(6);

        return view('appviews.admin.searchusers' ,compact('users'));
    }



    public function destroy($id)
    {
        if(isset($id)) {
            $users = User::find($id);
            if($users) {
                user::find($id)->delete();
                Session::flash('flash_message', 'user successfully deleted');
                return redirect()->back();
            }
        }
    }

    public function edit(Request $request, $id){

        $user = DB::table('users')->find($id);
        //dd($id);
        return view('appviews.admin.UpdateUserForm' ,compact('user'));
    }
    public function update(RegisterUserRequestUpdate $request, $id){

       $user= User::find($id);
        //dd($user);
       $user->update([
          'email' => $request->email,
           'password' => $request->password,
           'type' => $request->type,
           'badge_number'=>$request->badge_number,
           'type' => $request->type,

        ]);

       Session::flash('flash_message', 'user record successfully updated');
       return redirect()->back();
   }


    /**
     * patrol functions
     * passes users and other details to create patrol view
     */
    public function patrol_view(){
        $users = User::all();
        $patrols = Patrol::with('police')->get();

        $user_model = new User();

        return view('appviews.admin.patrols.CreatePatrol', compact('user_model','users','patrols'));
    }

    //creates patrol
    public function patrol_create(PatrolRequest $request){
        $patrol = Patrol::create(
            [
                'location' => $request->location,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'dispatch_time' => $request->dispatch_time,
            ]);

        foreach ($request->badge_number as $badge_number){

            $patrol->police()->create([
               'badge_number' => $badge_number
            ]);

        }

        Session::flash('flash_message', 'patrol successfully created');
        return redirect()->back();
   }
   //passess details to patrolmap view
    public function patrol_map($id){;
        $users = User::all();
        $patrol = Patrol::with('police')->find($id);
        $user_model = new User();

        return view('appviews.admin.patrols.PatrolMapView', compact('user_model','users','patrol'));
    }
    //passes data to the patrol map page
    public function patrol_map_markers($id){
        $locations = Patrol::where('id','=',$id)->first(['latitude', 'longitude', 'location'])->toArray();

        return response()->json(['data' => $locations]);
    }

}
