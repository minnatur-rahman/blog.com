@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Blog</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ url('panel/blog/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" id="inputName5" required>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Category *</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($getCategory as $value )
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Image *</label>
                <input type="file" name="image_file" class="form-control" id="inputName5" required>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Description *</label>
               <textarea name="description" id="inputName5" class="form-control tinymce-editor"></textarea>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Tags</label>
                <input type="text" name="tags" class="form-control" id="inputName5">
              </div>

              <div class="col-md-12">
                <label class="form-label">Meta Description</label>
               <textarea class="form-control" name="meta_description"></textarea>
                <div style="color:red">{{ $errors->first('meta_description') }}</div>
              </div>

              <div class="col-md-12">
                <label for="inputName5" class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control" id="inputName5">
                <div style="color:red">{{ $errors->first('meta_keywords') }}</div>
              </div>

              <hr>

              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Publish *</label>
               <select name="is_publish" id="inputPassword5" class="form-control">
                    <option value="1">No</option>
                    <option value="0">Yes</option>
               </select>
              </div>

              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Status *</label>
               <select name="status" id="inputPassword5" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
               </select>
              </div>
              <div class="col-md-12" style="margin-top: 30px">
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

 