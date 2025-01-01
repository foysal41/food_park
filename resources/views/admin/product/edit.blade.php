@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Products</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Product</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>






                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>







                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="" class="form-control select2">
                            <option value="">Select</option>
                            @foreach ($categories as $category )
                                <option @selected($product->category_id == $category->id) value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label>price</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    </div>







                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" class="form-control" value="{{ $product->offer_price }}">
                    </div>





                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" id="" class="form-control" cols="30" rows="10">{{ $product->short_description }}</textarea>
                    </div>




                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" id="" class="form-control summernote" cols="30" rows="10">{{ $product->long_description }}</textarea>
                    </div>




                    <div class="form-group">
                        <label>SKU </label>
                        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                    </div>





                    <div class="form-group">
                        <label>SEO Title </label>
                        <input type="text" name="seo_title" class="form-control" value="{{ $product->seo_title }}">
                    </div>




                    <div class="form-group">
                        <label>SEO Description </label>
                        <input type="text" name="seo_description" class="form-control" value="{{ $product->seo_description }}">
                    </div>




                    <div class="form-group">
                        <label>Show At Home</label>
                        <select name="show_at_home" id="" class="form-control">
                            <option @selected($product->show_at_home === 1) value="1">YES</option>
                            <option @selected($product->show_at_home === 0) value="0">NO</option>
                        </select>
                    </div>




                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($product-> status === 1) value="1">Active</option>
                            <option @selected($product-> status === 0) value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.image-preview').css(
            'background-image' : 'url({{ asset($product->thumb_image) }})',
            'background-size' :'cover',
            'background-position': 'center center'
        )
    })
</script>
@endpush
