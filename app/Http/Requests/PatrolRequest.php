<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class PatrolRequest extends Request
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
            'location' => 'required|max:255',
            'badge_number'=> 'required|max:255',
            'dispatch_time'=> 'required|date|after:'.Carbon::now(),
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ];
    }
}
