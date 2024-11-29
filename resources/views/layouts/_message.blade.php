@if (!empty(session('success')))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
@endif

@if (!empty(session('errors')))
  <div class="alert alert-danger" role="alert">
      {{ session('errors') }}
  </div>
@endif