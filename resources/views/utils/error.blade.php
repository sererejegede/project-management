@if(isset($errors) && count($errors) > 0)

  <div class="container">
    <div class="alert alert-danger alert-dismissible" role="alert">
      @foreach($errors->all() as $error)
        <li> <b>{{ $error }}</b> </li>
      @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

@endif