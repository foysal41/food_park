@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Products</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Product</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>






                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>







                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="" class="form-control select2">
                            <option value="">Select</option>
                            @foreach ($categories as $category )
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label>price</label>
                        <input type="text" name="price" class="form-control">
                    </div>




                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>




                    <div class="form-group">
                        <label>Show At Home</label>
                        <select name="show_at_home" id="" class="form-control">
                            <option value="1">YES</option>
                            <option selected value="0">NO</option>
                        </select>
                    </div>




                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>


    </section>
@endsection