@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Item </h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.update' , $whyChooseUs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <button class="btn btn-secondary" data-icon="{{ $whyChooseUs->icon }}" role="iconpicker" name="icon"></button>
                    </div>

                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $whyChooseUs->title }}">
                    </div>


                    <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control" value="{{ $whyChooseUs->short_description }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($whyChooseUs === 1 ) value="1">YES</option>
                            <option @selected($whyChooseUs === 0 ) value="0">NO</option>
                        </select>
                        </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>


    </section>
@endsection
