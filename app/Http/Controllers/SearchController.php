<?php

namespace App\Http\Controllers;

use App\crime_record;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    //search the welcome page
    public function search_records_welcome(Request $request)
    {
        $keyword = $request->keyword;
        $records = crime_record::SearchByKeyword($keyword)->paginate(6);

        return view('welcome', compact('records'));
    }

    //search the records update page
    public function search_records_update(Request $request)
    {
        $keyword = $request->keyword;
        $records = crime_record::SearchByKeyword($keyword)->paginate(6);

        return view('appviews.RecordManagement.editrecords', compact('records'));
    }

    //search the records delete page
    public function search_records_delete(Request $request)
    {
        $keyword = $request->keyword;
        $records = crime_record::SearchByKeyword($keyword)->paginate(6);

        return view('appviews.RecordManagement.deleterecords', compact('records'));
    }


    //search users in search users page
    public function search_users(Request $request)
    {
        $keyword = $request->keyword;
        $users = User::SearchByKeyword($keyword)->paginate(6);
        //dd($records);
        return view('appviews.admin.searchusers', compact('users'));
    }

    //search users in update users page
    public function search_users_update(Request $request)
    {
        $keyword = $request->keyword;
        $users = User::SearchByKeyword($keyword)->paginate(6);
        //dd($records);
        return view('appviews.admin.UpdateUser', compact('users'));
    }

    //search users in dlete users page
    public function search_users_delete(Request $request)
    {
        $keyword = $request->keyword;
        $users = User::SearchByKeyword($keyword)->paginate(6);
        //dd($records);
        return view('appviews.admin.DeleteUser', compact('users'));
    }
}
