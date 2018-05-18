@if(session()->has('success'))

  <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <b>{{ session()->get('success') }}</b>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

@endif