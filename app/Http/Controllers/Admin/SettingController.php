<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index() : View
    {
        return view('admin.setting.index');
    }

    public function UpdateGeneralSetting(Request $request){

       $validateData = $request->validate([
            'site_name' => ['required' , 'max:255'],
            'site_default_currency' => ['required' , 'max:255'],
            'site_currency_icon' => ['required' , 'max:255'],
            'site_currency_icon_position' => ['required' , 'max:255'],
        ]);


        foreach($validateData as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        toastr()->success('Settings updated successfully');
        return redirect()->back();

    }
}
