@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New User</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ route('user.store') }}" method="POST">
                @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName5" required>
                <div style="color:red">{{ $errors->first('name') }}</div>
              </div>
              <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('name') }}" class="form-control" id="inputEmail5" required>
                <div style="color:red">{{ $errors->first('email') }}</div>
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword5" required>
                <div style="color:red">{{ $errors->first('password') }}</div>
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Status</label>
               <select name="status" id="inputPassword5" class="form-control">
                    <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Active</option>
                    <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Inactive</option>
               </select>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
</section>

@endsection
@section('script')
@endsection

 