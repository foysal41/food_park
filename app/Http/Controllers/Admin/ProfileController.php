<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use Illuminate\Contracts\View\View;
use App\Traits\FileUploadTrait;
use Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    use FileUploadTrait;

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

        // for check is my data can be store or not: dd(request()->all());
        // for check is my avatar image can be store or not dd($request->all());

        $user = auth::user();

        //FileUploadTrait এর মদ্ধ uploadImage function name কল করলাম।
        $imagePath = $this->uploadImage($request , 'avatar');

        // for check is my avatar image can be store or not dd($imagePath);

        $user->name = $request->name;
        $user->email = $request->email;

//isset($imagePath) চেক করবে ভ্যারিয়েবলটি সেট করা আছে কিনা। 2. যদি সেট থাকে, তাহলে $imagePath নিজেই ব্যবহৃত হবে। 3. যদি সেট না থাকে, তাহলে $user()->avatar থেকে ইউজারের অ্যাভাটার নেওয়া হবে।
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->save();

        toastr('Updated Successfully', 'success');
        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request) :RedirectResponse{


      $user = Auth::user();
      $user->password = bcrypt($request->password);
      $user->save;

      toastr('Updated Successfully', 'success');
        return redirect()->back();
    }
}
