<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //authorize-এ আমরা এটি আপাতত true সেট করব। না হলে এটি কাজ করবে না।
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


            /*
                nullable রুল যোগ করা: ইমেজ ফিল্ড (অথবা Avatar ফিল্ড) ফাঁকা থাকতে পারে।
                image/ইমেজ ভ্যালিডেশন: Avatar ইনপুটটি সত্যিই একটি ইমেজ কিনা, তা যাচাই করা হবে।
                max/ইমেজ সাইজ সীমাবদ্ধ করা: ইমেজের সর্বোচ্চ সাইজ 3000 কিলোবাইট (প্রায় 3MB) নির্ধারণ করা হয়েছে।
            */
            'avatar' => ['nullable' , 'image' , 'max:3000'],
            'name' => ['required', 'max:50'],


            /*
                যখন আমরা unique নিয়মটি আপডেটের জন্য ব্যবহার করি, তখন আমাদের বর্তমান রো আইডিটি উপেক্ষা করতে হয়। কারণ আমরা যে রো আপডেট করছি, সেটির সাথে অন্য কোনো রো’র ডেটা মিলিয়ে না যায়। যেমন, আমরা যদি ইউজার প্রোফাইল আপডেট করি এবং একই নাম বা ইমেইল অন্য কোনো রোতে থাকলে সেটা যেন সমস্যা না করে।

                এটা করার জন্য unique রুলের সাথে বর্তমান ইউজারের রো আইডি (যেটা আপডেট করা হচ্ছে) উপেক্ষা করতে হবে। অর্থাৎ, আমরা বলতে চাই, “এটি ইউনিক হবে, তবে বর্তমান ইউজারের আইডি মিলিয়ে দেখবে না।”

                    এটা করতে হলে unique রুলের পরে .ignore(বর্তমান ইউজারের আইডি) যুক্ত করতে হয়। এজন্য auth() ব্যবহার করে বর্তমান লগইনকৃত ইউজারের আইডি নেয়া  যায়।
            */

            /*
             Reason of the request validation: আমরা এখন ফ্রন্টএন্ডে ইমেইল বা নাম না দিয়ে সাবমিট করবো। ইমেইল ও নাম ফিল্ডে কিছু না দিলে সেটি জমা (submit) হবে না।

            */
            'email' => ['required',  'email', 'max:200', 'unique:users,email,' .auth(0)->user()->id],


        ];
    }
}
