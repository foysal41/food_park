<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

/*
--------| Summray of setup yajra datatable |---------

1. Quick Starter: লারাভেল ইনস্টল করা থাকলে laravel new datatables এই command ইন্সটল করা লাগবে না. আমরা শুধু  composer require yajra/laravel-datatables ইন্সটল করব. and Vite mySql সব সেটআপ করা আছে.

2. Getting Started>install: https://datatables.net/ css and js add করে নিব

3. php artisan datatables:make Users/slider  এই কমান্ডটি DataTable সার্ভিস ক্লাস তৈরি করে, যা একটি নির্দিষ্ট মডেলের ডেটা টেবিল হিসেবে দেখানোর কাজ করে। এর মাধ্যমে app এর মধ্যে slider data টেবিল তৈরি হবে



*/


/*

-------| Home Slider- Showing Data at Index Datatable |---------

1.  এই পার্ট, আমরা আমাদের slider index পেজে কিছু ডেটা প্রদর্শন করব। আগে, আমরা slider টেবিলে কিছু dummy ডেটা সিড করেছিলাম। এখন, আমরা সেই ডেটাগুলো fetch করব এবং সেগুলো DataTable এ দেখাব। Go to resource> view> admin>slider index.php

2. https://yajrabox.com/ থেকে বলসে ৪ নাম্বার স্টেপ এ controller বানাতে তা বানিয়াছি।       এখানে, তাদের slider এর জন্য একটি কন্ট্রোলার already তৈরি রয়েছে, তাই নতুন করে কন্ট্রোলার তৈরি করতে হবে না।

তারা তাদের তৈরি করা DataTable ক্লাসটি index মেথডে inject করছেন। এরপর, ভিউটি সরাসরি ভেরিয়েবল ইনস্ট্যান্স থেকে না ফেরত দিয়ে, DataTable ক্লাসটি ব্যবহার করে ভিউটি রেন্ডার করছেন।

Blade ফাইলে, তারা DataTable ভেরিয়েবল থেকে table মেথড কল করে ডেটা টেবিলের স্ট্রাকচার তৈরি করছেন এবং শেষে ডাইনামিক JavaScript কোড যোগ করছেন।

3. ৪ নাম্বার স্টেপ থেকে  admin>slider>index page এ ডায়নামিক ডাটা টেবিলটা পাস করে দিব|

৪. Goto sliderDataTable.php edit getColumns()


*/


class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='".route('admin.slider.edit' , $query->id)."' class='btn btn-primary btn-sm'> <i class='fas fa-edit'></i></a>";

                $delete = "<a href='".route('admin.slider.destroy' , $query->id)."' class='btn btn-danger btn-sm ml-2 delete-item'> <i class='fas fa-trash'></i></a>";
                return $edit.$delete;
            })->addColumn('image' , function($query){
                return '<img src="'.asset($query->image).'" alt="" width="50" height="50">';
            })->addColumn('status' , function($query){
                if($query->status === 1){
                    return '<span class="badge badge-primary">Active</span>';
                }else{
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })

            ->rawColumns(['image' , 'status' , 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->width(60),
            Column::make('image')->width(100),
            Column::make('title'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(140)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}
