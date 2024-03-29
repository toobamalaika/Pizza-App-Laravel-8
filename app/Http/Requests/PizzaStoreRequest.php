<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaStoreRequest extends FormRequest
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
        // return [
        //     'name' => 'required|string|min:3',
        //     'description' => 'required|string',
        //     'small_pizza_price' => 'required|numeric',
        //     'medium_pizza_price' => 'required|numeric',
        //     'large_pizza_price' => 'required|numeric',
        //     'category' => 'required',
        //     'image' => 'required|mimes:png,jpg,jpeg'
        // ];

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|string|min:3',
                    'description' => 'required|string',
                    'small_pizza_price' => 'required|numeric',
                    'medium_pizza_price' => 'required|numeric',
                    'large_pizza_price' => 'required|numeric',
                    'category' => 'required',
                    'image' => 'required|mimes:png,jpg,jpeg'
                    
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|string|min:3',
                    'description' => 'required|string',
                    'small_pizza_price' => 'required|numeric',
                    'medium_pizza_price' => 'required|numeric',
                    'large_pizza_price' => 'required|numeric',
                    'category' => 'required',
                    'image' => 'mimes:png,jpg,jpeg'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
