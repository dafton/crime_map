<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','badge_number','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function is_admin(){
        if($this->type == 1){
            return true;
        }
    }
    public function is_recordManager(){
        if($this->type == 2){
            return true;
        }
    }
    public function is_normalUser(){
        if($this->type == 0){
            return true;
        }
    }
    public function get_by_badge($badge_number){
        return $this->where('badge_number','=', $badge_number)->first()->name;
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("badge_number", "LIKE", "%$keyword%");
                    //orWhere("type", "LIKE", "%$keyword%");
            });
        }
        return $query;

    }

}
