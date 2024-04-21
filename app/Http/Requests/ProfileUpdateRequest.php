<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'mobile'=>['numeric','digits:10'],
            'skills'=>['nullable'],
            'wisdom'=>['nullable'],
            'image'=>['nullable'],
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'يرجى إدخال عنوان البريد الإلكتروني.',
            'name.required' => 'يرجى إدخال الاسم.',
            'mobile.digits' => 'يجب أن يتكون رقم الجوال من 10 أرقام',
            'mobile.numeric' =>'رقم الجوال عبارة عن رقم'

        ];
    }
}
