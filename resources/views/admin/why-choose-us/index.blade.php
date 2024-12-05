@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Why Choose Us</h1>
    </div>
    <div class="card">
        <div class="card-body">
          <div id="accordion">
            <div class="accordion">
              <div class="accordion-header collapsed bg-primary text-light p-3" role="button" data-bs-toggle="collapse" data-bs-target="#panel-body-1" aria-expanded="false">
                <h4>Why Choose Us Section</h4>
              </div>
              <div class="accordion-collapse collapse" id="panel-body-1" data-bs-parent="#accordion">
                <div class="accordion-body">
                  <form>
                    <div class="form-group">
                      <label for="top-title">Top Title</label>
                      <input type="text" class="form-control" id="top-title">
                    </div>

                    <div class="form-group">
                      <label for="main-title">Main Title</label>
                      <input type="text" class="form-control" id="main-title">
                    </div>

                    <div class="form-group">
                      <label for="sub-title">Sub Title</label>
                      <input type="text" class="form-control" id="sub-title">
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




</section>


    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
              <h4>All Items</h4>
              <div class="card-header-action">
                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                 Create New
                </a>
              </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
          </div>


    </section>
@endsection


@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
