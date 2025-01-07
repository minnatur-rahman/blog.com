@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Users List
            <a href="" class="btn btn-primary" style="float: right;margin-top: -12px;">Add New</a>
          </h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Emai Verified</th>
                <th scope="col">Status</th>
                <th scope="col">Created Date</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($getRecord as $value )
                <tr>
                  <th scope="row">1</th>
                  <td>Brandon Jacob</td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                </tr>
              @empty
                <tr>
                  <td colspan="100%">Record not found</td>
                </tr>
              @endforelse

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
    </div>
  </div>
</section>

 @endsection
 
@section('script')
@endsection

 