<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaliMuridSettingsUpdateRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'password' => 'nullable',
            'wali_murid_images' => 'nullable|image|max:8000'
        ];
    }
}
