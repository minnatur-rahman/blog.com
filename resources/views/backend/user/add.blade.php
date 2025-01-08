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
            <form class="row g-3" action="" method="POST">
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputName5">
              </div>
              <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail5">
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword5">
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Status</label>
               <select name="" id="" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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

 