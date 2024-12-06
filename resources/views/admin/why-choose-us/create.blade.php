@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Item </h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Icon</label>
                        <button class="btn btn-secondary" role="iconpicker"></button>
                    </div>

                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                    </div>


                    <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" name="short_description" class="form-control">
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
