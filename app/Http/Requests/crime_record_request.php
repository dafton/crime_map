<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class crime_record_request extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'crime_type' => 'required|max:255',
            'offender_name' => 'max:255',
            'offender_id' => 'max:10|unique:crime_records',
            'area_committed' => 'required|max:255',
            'time_committed' => 'required|date|before:'.Carbon::now(),
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ];
    }


}
