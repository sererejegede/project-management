@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
    <div class="card">
      <div class="card-header bg-secondary text-white">
        Companies
      </div>
      <ul class="list-group list-group-flush">
        @foreach($companies as $company)
          <li class="list-group-item">{{ $company->name }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection