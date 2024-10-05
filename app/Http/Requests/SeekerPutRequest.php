<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeekerPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content_id' => 'required|exists:contents,id',
            'nickname' => 'required|max:100',
            'price' => 'numeric|min:1|max:999999',
            'employer_ids' => 'required|array',
            'employer_ids.*' => 'required|exists:employers,id',
        ];
    }
}
