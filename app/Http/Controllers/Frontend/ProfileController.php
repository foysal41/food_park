<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse{
        $user = Auth::user();
        $user->name = $request->name;
        $user->email  = $request->email;
        $user->save();

        toastr('Updated Successfully', 'success');
        return redirect()->back();
    }


    function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse{

        //We have to create a "request class", extra request class, mean custom request class for handling our validations.

        $user = Auth::user();
        $user->password = bcrypt($request->current_password);
        $user->save();

        toastr('Updated Successfully', 'success');


        return redirect()->back();

    }


    function updateAvatar(Request $request) {
        //dd($request->all());
        $imagepath = $this->uploadImage($request, 'avatar');

        $user = Auth::user();
        $user->avatar = $imagepath;
        $user->save();

        return response(['status' => 'success' , 'message' => 'avatar updated successfully']);
    }
}
