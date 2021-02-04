<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            "guest_full_name" => 'required|string|min:4',
             "guest_credit_card" => 'required|min:14',
             "room"  => 'required|min:3|max:3',
             "from_date" => 'required|date',
             "to_date" => "required|date",
             "more_details" => 'string', 
        ];
    }
}
