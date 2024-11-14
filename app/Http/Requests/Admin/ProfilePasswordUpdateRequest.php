<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class ProfilePasswordUpdateRequest extends FormRequest
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
            //ল্যারাভেলে বর্তমান পাসওয়ার্ড যাচাই করার জন্য একটি বিল্ট-ইন রুল আছে, যেটি current_password নামে পরিচিত। যদি কোনো ত্রুটি হয়, তাহলে সেই রুল ব্যবহার করে সহজেই বর্তমান পাসওয়ার্ড যাচাই করা যাবে।
            'current_password' => ['required' , 'current_password'],
            'password' => ['required' , 'min:5' , 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }


    function message(): array {
        return [
            'current_password.current_password' => 'Current Password is invalid!'
        ];
    }
}
