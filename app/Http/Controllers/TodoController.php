<?php

namespace App\Http\Controllers;

use App\crime_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class TodoController extends Controller
{
    public function destroy($id)
    {
        if(isset($id)) {
            $record = crime_record::find($id);
            if($record) {
                crime_record::find($id)->delete();
                Session::flash('flash_message', 'crime record successfully deleted');
                return redirect()->back();
            }
        }
    }
}
