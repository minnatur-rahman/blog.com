@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit User</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ route('user.store') }}" method="POST">
                @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" id="inputName5" required>
              </div>
              <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" id="inputEmail5" required>
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword5" required>
                <p style="margin-bottom: 0px;margin-top: 5px;font-size: 14px">Do you want change password so please fill pasword input box</p>
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Status</label>
               <select name="status" id="inputPassword5" class="form-control">
                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Active</option>
                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Inactive</option>
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

 