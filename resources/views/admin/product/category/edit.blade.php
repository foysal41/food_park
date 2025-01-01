@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update' , $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>


                    <div class="form-group">
                        <label>Show At Home</label>
                        <select name="show_at_home" id="" class="form-control">
                            <option @selected($category->show_at_home === 1) value="1">YES</option>
                            <option @selected($category->show_at_home === 0) value="0">NO</option>
                        </select>
                        </div>




                    <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option @selected($category->stats === 1) value="1">Active</option>
                        <option @selected($category->stats === 0) value="0">Inactive</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>


    </section>
@endsection
