@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <div class="card">
        <div class="card-header bg-secondary text-white">
          Users
        </div>
        <ul class="list-group list-group-flush">
          @foreach($users as $user)
            <li class="list-group-item">{{ $user->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
@endsection