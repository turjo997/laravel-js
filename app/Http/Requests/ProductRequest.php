<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|unique:products',
            'sku' => 'required',
            'description' => 'required'
        ];
        // return [
        //     'title' => ['string'],
        //     'sku' => ['string'],
        //     'description' => ['string']
        // ];
        // if ($this->method() == 'PUT') {
        //     return [
        //         'title' => 'required|unique:products,title,' . $this->route('product')
        //     ];
        // }

        // return [
        //     'title' => 'required|unique:products',
        //     'description'
        // ];
    }
}
