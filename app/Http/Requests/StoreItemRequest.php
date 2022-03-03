<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required|unique:items',
            'category_id' => 'required',
            'type' => 'required',
            'outlet_id' => 'required',
            'added_date' => 'required',
            'rent_per_day' => 'required_if:type,Rentable',
            'rent_per_week' => 'required_if:type,Rentable',
            'rent_per_month' => 'required_if:type,Rentable',
            'rent' => 'required_if:type,Supportable',
            'market_value' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}
