<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patrol extends Model
{

    protected $table = 'patrol';
    protected $fillable = [
        'location', 'badge_number', 'dispatch_time','latitude','longitude'
        ];

    public function police(){
        return $this->hasmany(Police::class, 'patrol_id');
    }

}
