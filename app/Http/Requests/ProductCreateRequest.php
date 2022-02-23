<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCreateRequest extends FormRequest
{
    //

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $tmp = json_decode($this->product_data);
        $this->merge((array)$tmp);
    }
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
            'file_img_product' => 'required|mimes:jpeg,jpg,png,gif|max:100000',
            'category_id' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'memory_id' => 'required|exists:memories,id',
            'ram_id' => 'required|exists:rams,id',
            'display_id' => 'required|exists:display_sizes,id',
            'battery_id' => 'required|exists:batteries,id',
            'operating_system_id' => 'required|exists:operating_systems,id',
            'name' => 'required|max:255',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'old_cost' => 'required|numeric',
            'content_post' => 'required',
        ];
    }

    /**
     * ...
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * ...
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'error' => $validator->errors(),
                'status' => false,
                'status_code' => 422,
            ],
        ));
    }
}
