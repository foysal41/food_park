@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Gallery  ({{ $product->name }})</h1>
        </div>

        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-2">Go Back</a>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Gallery</h4>

            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <form action="{{ route('admin.product-gallery.store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> upload </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <div class="card card-primary">

            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($images as $image )
                    <tr>
                        <td><img width="150px" src="{{ asset($image->image) }}" alt=""></td>
                        <td>
                            <a href='{{ route('admin.product-gallery.destroy' , $image->id) }}' class='btn btn-danger btn-sm ml-2 delete-item'> <i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                    @endforeach

                    @if(count($images) === 0){
                        <tr>
                            <td colspan="2" class="text-center">No Data Found</td>
                        </tr>
                    }
                    @endif

                    </tbody>


                </table>


            </div>
        </div>


    </section>
@endsection

