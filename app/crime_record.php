<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crime_record extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'crime_type', 'offender_name', 'offender_id', 'area_committed', 'time_committed','latitude','longitude', 'marker_color','marker_id',
    ];


    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("offender_name", "LIKE", "%$keyword%")
                    ->orWhere("crime_type", "LIKE", "%$keyword%")
                    ->orWhere("area_committed", "LIKE", "%$keyword%")
                    ->orWhere("time_committed", "LIKE", "%$keyword%");
            });
        }
        return $query;

    }

    public function marker()
    {
        return $this->hasOne(Marker::class, 'marker_id');
    }

}
