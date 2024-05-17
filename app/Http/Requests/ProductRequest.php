<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if (request()->isMethod('POST')){
            return [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
				'description' => 'nullable',
				'price' => 'required|numeric|gt:0',
				'date_caducidade' => 'nullable',
				'quantity' => 'required|numeric|gt:0',
				'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'status' => 'nullable',
                'registerby' => 'nullable',		
            ];
        }elseif (request()->isMethod('put')){
            return[
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
				'description' => 'nullable',
				'price' => 'required|numeric|gt:0',
				'date_caducidade' => 'nullable',
				'quantity' => 'required|numeric|gt:0',
				'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'status' => 'nullable',
                'registerby' => 'nullable',
            ];

        }
        
    }
}
