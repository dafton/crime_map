<?php

use Illuminate\Database\Seeder;

class MarkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markers')->insert([
            'id'=>'1',
            'name'=>'007FFF',
            'crime_type'=>'homicide'
        ]);
        DB::table('markers')->insert([
            'id'=>'2',
            'name'=>'0000FF',
            'crime_type'=>'rape'
        ]);
        DB::table('markers')->insert([
            'id'=>'3',
            'name'=>'00FFFF',
            'crime_type'=>'robbery'
        ]);
        DB::table('markers')->insert([
            'id'=>'4',
            'name'=>'00FF00',
            'crime_type'=>'aggreveted assault'
        ]);
        DB::table('markers')->insert([
            'id'=>'5',
            'name'=>'001900',
            'crime_type'=>'burglary'
        ]);
        DB::table('markers')->insert([
        'id'=>'6',
        'name'=>'FF00FF',
        'crime_type'=>'Motor Vehicle Theft'
    ]);
        DB::table('markers')->insert([
            'id'=>'7',
            'name'=>'190019',
            'crime_type'=>'arson'
        ]);
        DB::table('markers')->insert([
            'id'=>'8',
            'name'=>'FFA500',
            'crime_type'=>'forgery'
        ]);
        DB::table('markers')->insert([
            'id'=>'9',
            'name'=>'332100',
            'crime_type'=>'fraud'
        ]);
        DB::table('markers')->insert([
            'id'=>'10',
            'name'=>'FF0000',
            'crime_type'=>'vandalism'
        ]);
        DB::table('markers')->insert([
            'id'=>'11',
            'name'=>'330000',
            'crime_type'=>'weapons'
        ]);
        DB::table('markers')->insert([
            'id'=>'12',
            'name'=>'FFFF00',
            'crime_type'=>'prostitution'
        ]);
        DB::table('markers')->insert([
            'id'=>'13',
            'name'=>'2F4F4F',
            'crime_type'=>'Sex offences'
        ]);
        DB::table('markers')->insert([
            'id'=>'14',
            'name'=>'5F9F9F',
            'crime_type'=>'drug abuse violation'
        ]);
        DB::table('markers')->insert([
            'id'=>'15',
            'name'=>'683A5E',
            'crime_type'=>'driving under the influence'
        ]);
        DB::table('markers')->insert([
            'id'=>'16',
            'name'=>'2E0854',
            'crime_type'=>'curfew and loitering offences'
        ]);

    }
}
