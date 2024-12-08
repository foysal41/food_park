<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    function index(): View {

        $sectionTitles =$this->getSectionTitles();
        //dd($sectionTitles);
        $sliders = Slider::where('status' , 1)->get();
        $whyChooseUs = WhyChooseUs::where('status' , 1)->get();

        return view('frontend.home.index' , compact('sliders' , 'sectionTitles' , 'whyChooseUs'));

    }

    function getSectionTitles(): Collection{
        $key = [
            'why_choose_top_title' ,
            'why_choose_main_title' ,
            'why_choose_sub_title'
        ];
        return  SectionTitle::WhereIn('key' , $key)->pluck('value', 'key');
    }

}
