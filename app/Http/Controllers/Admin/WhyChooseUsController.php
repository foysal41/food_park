<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WhyChooseUsCreateRequest;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WHyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WhyChooseUsDataTable $dataTable)
    {

        $key = ['why_choose_top_title' , 'why_choose_main_title' , 'why_choose_sub_title'];
        $titles = SectionTitle::WhereIn('key' , $key)->pluck('value', 'key');
        //dd($title);
        return $dataTable->render('admin.why-choose-us.index' , compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view ('admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsCreateRequest $request) : RedirectResponse
    {
        //dd($request->all());

        WhyChooseUs::create($request->validated());

        toastr()->success('Created Successfully');

        return to_route('admin.why-choose-us.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateTitle(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'why_choose_top_title' => 'max:100',
            'why_choose_main_title' => 'max:200',
            'why_choose_sub_title' => 'max:300',
        ]);


        SectionTitle::updateOrCreate(
            //এখানে যে ঘটনাটি ঘটছে যদি "key" এর ভেতরে কোন লেখা/ টেক্সট থাকে তাহলে "value" ভিতরে আপডেট অথবা তৈরি করবে
            ['key' => 'why_choose_top_title'],
            ['value' => $request->why_choose_top_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_main_title'],
            ['value' => $request->why_choose_main_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_sub_title'],
            ['value' => $request->why_choose_sub_title]
        );

        // Success message
        toastr()->success('Successfully Updated');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
