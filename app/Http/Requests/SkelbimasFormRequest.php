<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkelbimasFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'image' => ['max:2048'],
            'dscription' => 'required',
            'price' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => strip_tags($this->title),
            'dscription' => strip_tags($this->dscription),
            'price' => strip_tags($this->price)
        ]);
    }
}
