@extends('admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Slider</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update' , $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}">
                    </div>

                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>

                    <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                    </div>

                    <div class="form-group">
                    <label>Short Description</label>

                    <textarea name="description" class="form-control" name="description" > {{ $slider->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}">
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{ $slider->status === 1 ?  'Selected' : '' }} value="1">Active</option>
                        <option {{ $slider->status === 0 ?  'Selected' : '' }} value="0">Inactive</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>


    </section>


@endsection

{{--
 --------|  Home Slider- Update Slider Feature (Part - 3)   |-----------
1. যখন আপডেট view থেকে হিট করা হবে তখন update controller এর মধ্যে যে হিট করবে
2. এখন একটা request বানাবো সেটা হচ্ছে edit slider এর জন্য [php artisan make:request admin/SliderUpdateRequest]
3. এখানে যখন আমরা প্রোফাইলের ছবি আপলোড করব,  তখন আমাদের খেয়াল রাখতে হবে যে আগের ছবিটা আছে সেটাকে ডিলিট করতে হবে


--}}


@push('scripts')
<script>
    $(document).ready(function(){
        $('.image-preview').css(
            'background-image' : 'url({{ asset($slider->image) }})',
            'background-size' :'cover',
            'background-position': 'center center'
        )
    })
</script>
@endpush
