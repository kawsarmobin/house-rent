<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseInfoRequest extends FormRequest
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
            'landlord' => 'required',
            'house_type' => 'required',
            'title' => 'required',
            'house_address' => 'required',
            'bed_room' => 'required',
            'wash_room' => 'required',
            'porches' => 'required',
            'drawing_room' => 'required',
            'dining_room' => 'required',
            'store_room' => 'required',
            'rent_amount' => 'required',
        ];
    }
}
