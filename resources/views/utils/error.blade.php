@if(session()->has('custom_error'))
  <div class="container">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <b>{{ session()->get('custom_error') }}</b>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif
@if(isset($custom_errors) && count($custom_errors) > 0)

  <div class="container">
    <div class="alert alert-danger alert-dismissible" role="alert">
      @foreach($custom_errors->all() as $error)
        <li> <b>{{ $error }}</b> </li>
      @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

@endif