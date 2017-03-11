<?php

use Illuminate\Database\Seeder;

class CrimeRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crime_records')->insert([
            'crime_type'=>'drug abuse violation',
            'marker_id'=>'14',
            'marker_color'=>'00FF00',
            'area_committed'=>'Triple G Hostel, Juja, Kenya',
            'latitude'=>'-1.1016959',
            'longitude'=>'37.0158108',
            'offender_name'=>'kiema',
            'offender_id'=>'68468',
            'time_committed'=>'2016-11-16 12:30:07'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'prostitution',
            'marker_id'=>'12',
            'marker_color'=>'FFFF00',
            'area_committed'=>'Prime Ways Building, Juja, Kenya',
            'latitude'=>'-1.1024253',
            'longitude'=>'37.0112189',
            'offender_name'=>'Sammy',
            'offender_id'=>'5343573',
            'time_committed'=>'2016-11-16 08:00:07'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'homicide',
            'marker_id'=>'1',
            'marker_color'=>'007FFF',
            'area_committed'=>'Wima Hostels, Gachororo road, Juja, Kenya',
            'latitude'=>'-1.0963324',
            'longitude'=>'37.0201453',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-09-14 02:30:07'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'Motor Vehicle Theft',
            'marker_id'=>'6',
            'marker_color'=>'FF00FF',
            'area_committed'=>'Wima Hostels, Gachororo road, Juja, Kenya',
            'latitude'=>'-1.0963324',
            'longitude'=>'37.0201453',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-09-14 02:30:07'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'rape',
            'marker_id'=>'2',
            'marker_color'=>'0000FF',
            'area_committed'=>'JKUAT Main Gate, Gachororo road, Juja, Kenya',
            'latitude'=>'-1.1019694',
            'longitude'=>'37.0139977',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2017-02-23 20:50:19'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'arson',
            'marker_id'=>'7',
            'marker_color'=>'190019',
            'area_committed'=>'Artetian House, Juja, Kenya',
            'latitude'=>'-1.1012668',
            'longitude'=>'37.0132896',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-17 00:50:06'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'vandalism',
            'marker_id'=>'10',
            'marker_color'=>'FF0000',
            'area_committed'=>'Cam Apartments, Gatundu-Juja Road, Juja, Kenya',
            'latitude'=>'-1.1061582',
            'longitude'=>'37.0134505',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-17 04:10:31'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'fraud',
            'marker_id'=>'9',
            'marker_color'=>'332100',
            'area_committed'=>'New Constructions Students Workshop, Bypass, Juja, Kenya',
            'latitude'=>'-1.0986494',
            'longitude'=>'37.0146950',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-15 23:25:06'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'aggreveted assault',
            'marker_id'=>'4',
            'marker_color'=>'00FF00',
            'area_committed'=>'Gilkan, JKUAT Entry Rd, Juja, Kenya',
            'latitude'=>'-1.1054288',
            'longitude'=>'37.0135363',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-13 23:10:59'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'curfew and loitering offences',
            'marker_id'=>'16',
            'marker_color'=>'2E0854',
            'area_committed'=>'Gatundu-Juja Road, Juja, Kenya',
            'latitude'=>'-1.1009664',
            'longitude'=>'37.0102318',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-18 01:05:07'
        ]);
        DB::table('crime_records')->insert([
            'crime_type'=>'burglary',
            'marker_id'=>'5',
            'marker_color'=>'001900',
            'area_committed'=>'Sun City House, Juja, Kenya',
            'latitude'=>'-1.1029831',
            'longitude'=>'37.0116051',
            'offender_name'=>'',
            'offender_id'=>'',
            'time_committed'=>'2016-11-17 04:05:50'
        ]);
    }
}
