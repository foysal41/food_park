@extends('admin.layouts.master');

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
          <h4>Update User Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update') }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                  </div>

                  <button class="btn btn-primary" type="submit"> Save Change </button>
            </form>

        </div>
      </div>


      <div class="card card-primary">
        <div class="card-header">
          <h4>Update Password</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control" >
                  </div>

                <div class="form-group">
                    <label>New Password </label>
                    <input type="password" name="password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                  </div>
                  <button class="btn btn-primary" type="submit"> Save Change </button>
            </form>

        </div>
      </div>
  </section>
@endsection
