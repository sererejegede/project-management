@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-header bg-secondary text-white">
          Projects
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            @foreach($projects as $project)
              <a href="companies/{{ $project->id }}">
                <li class="list-group-item">{{ $project->name }}</li>
              </a>
            @endforeach
          </ul>
          <a href="{{ route('projects.create') }}" class="btn btn-info float-right">Add New</a>
        </div>
      </div>
    </div>
  </div>
@endsection