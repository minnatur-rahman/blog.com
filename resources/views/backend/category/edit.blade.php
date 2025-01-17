@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Catetory</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ url('panel/category/store') }}" method="POST">
                @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" id="inputName5" required>
                <div style="color:red">{{ $errors->first('name') }}</div>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Title *</label>
                <input type="text" name="title" value="{{  $getRecord->title }}" class="form-control" id="inputName5" required>
                <div style="color:red">{{ $errors->first('title') }}</div>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Meta Title *</label>
                <input type="text" name="meta_title" value="{{  $getRecord->meta_title }}" class="form-control" id="inputName5" required>
                <div style="color:red">{{ $errors->first('meta_title') }}</div>
              </div>

              
              <div class="col-md-12">
                <label class="form-label">Meta Description</label>
               <textarea class="form-control" name="meta_description">{{ $getRecord->meta_description }}</textarea>
                <div style="color:red">{{ $errors->first('meta_description') }}</div>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ $getRecord->meta_keywords  }}" class="form-control" id="inputName5">
                <div style="color:red">{{ $errors->first('meta_keywords') }}</div>
              </div>


             
              <hr>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Status *</label>
               <select name="status" id="inputPassword5" class="form-control">
                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Active</option>
                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="0">Inactive</option>
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

 

