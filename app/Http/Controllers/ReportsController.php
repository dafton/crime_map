<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\crime_record;
use App\Patrol;
use App\Police;
use App\User;
use App\Http\Requests;

class ReportsController extends Controller
{
    protected $max_count = 0;

    protected $crimes;

    protected $hotspot;

    protected $hotspot_ties = [];

    protected $crime_ties = [];

    protected $hotspot_ties_count;

    protected $crime_ties_count;

    protected $runners_up_hotspot;

    protected $runners_up_crimes;

    protected $runners_up_count = 0;

    protected $runners_up_crime_count = 0;

    protected $runners_up_ties = [];

    protected $runners_up_crime_ties = [];


    public function reports_page(){




        $hotspots = DB::table('crime_records')
            ->select(DB::raw('count(area_committed) as area_count, area_committed'))
            ->groupBy('area_committed')
            ->orderBy('area_count','desc')
            ->limit(4)
            ->get();
        $raw_crimes = DB::table('crime_records')
            ->select(DB::raw('count(crime_type) as crime_count, crime_type'))
            ->groupBy('crime_type')
            ->orderBy('crime_count','desc')
            ->limit(4)
            ->get();

        $dates = DB::table('crime_records')
            ->select(DB::raw('count(MONTH(time_committed)) as time_count, MONTH(time_committed) as month'))
            ->groupBy('month')
            ->orderBy('time_count','desc')
            ->limit(4)
            ->get();


        return view('SystemReports',
            compact(
                'hotspots',
                'raw_crimes',
                'dates'
            ));
    }




}
