<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //$id = $this->segment(2); //Pega o segmento da URL /modelos/id
        $id = $this->id; //Pega ID pelo name do parametro

        $rules = [
            'brand_id' => [
                'required',
                'exists:brand_cars,id'
            ],
            'model_id' => [
                'required',
                'exists:model_cars,id'
            ],
            'color_id' => [
                'required',
                'exists:color_cars,id'
            ],
            'doors' => 'required|integer|gt:0',
            'year' => 'required|integer|gt:1900',
            'km' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
        ];

        return $rules;
    }
}
