<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('brand_cars')->ignore($id), //valida o campo name como unico, mas exceto quando for do ID informado
            ],
        ];

        return $rules;
    }
}
