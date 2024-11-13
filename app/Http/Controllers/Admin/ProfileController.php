<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index() : View{
        return view('admin.profile.index');
    }



     /*

যদি অ্যাডমিন ফর্মটি খালি অবস্থায় জমা দেন, তাহলে আমাদের একটি ত্রুটি বার্তা দেখানো উচিত, তাই না?  এর জন্য php artisan make:request Admin/ProfileUpdateRequest

তাহলে চলুন আবার কোডে ফিরে যাই এবং এটা কীভাবে করা যায় দেখি

*/

        /*
            আগে profileUpdateRequest  এ কাজ করে আছেছি। তাহলে চলুন আমাদের ProfileController খুলে নেই এবং এখানে আমরা Dependency Injection এর মাধ্যমে এই ক্লাসটি ইনজেক্ট করব।

        */


    function updateProfile(ProfileUpdateRequest $request) : RedirectResponse {

        return redirect()->back();
    }
}
