@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Slider</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" name="offer" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>


    </section>
@endsection
{{--
----------------| Home Slider- Create Slider Feature (Part - 2) |----------------
1. here first work is set all field put name attrubute Then set form action(route) and method
2. Second work SliderController এর মদ্ধে dd দিয়ে ডাটা store হচ্ছে কিনা তা check korlam.
3. third work : অই ডাটা validate করার জন্য একটা request class বানাবো। php artisan make:request Admin/SliderCreateRequest এর মদ্ধে all field valid করলাম। এবং slider create migrate file এ কিছু change করলাম। এবার re migrate করতে হবে। php artisan migrate:fresh->এটা করলে সব ডাটা চলে যাবে|
এবার seeder গুলা update করতে হবে। php artisan db:seed
তা হলে user and admin এর id and pass seed update হয়ে যাবে।
আর database>seeders>databaseseeer.php এর মদ্ধে slider factory ৩ তা uplaod হয়ে যাবে।

4. Validation rule slider controller এর মদ্ধে apply করার জন্য parameter হিসাবে অই request class দেখলাম। End the part 

--}}
