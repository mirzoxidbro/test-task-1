<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "passport" => "required|string|max:9|min:9",
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "father_name" => "required|string|max:255",
            "position" => "required|string|max:255",
            "phone_number" => "required|numeric",
            "address" => "required|string|max:255",
            "company_id" => "required"

        ];
    }
}
