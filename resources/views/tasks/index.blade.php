@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-header bg-secondary text-white">
          Tasks
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            @foreach($tasks as $task)
              <a href="companies/{{ $task->id }}">
                <li class="list-group-item">{{ $task->name }}</li>
              </a>
            @endforeach
          </ul>
          <a href="{{ route('tasks.create') }}" class="btn btn-info float-right">Add New</a>
        </div>
      </div>
    </div>
  </div>
@endsection