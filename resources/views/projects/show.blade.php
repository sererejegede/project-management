@extends('layouts.app')

@section('content')


    <!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container">
  <h1 class="display-3">{{ $company->name }}</h1>
  <p>{{ $company->description }}</p>
  {{--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a>--}}
</div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        @foreach($company->projects as $project)
        <div class="col-md-4">
          <h2>{{ $project->name }}</h2>
          <p>{{ $project->description }}</p>
            <a class="btn btn-secondary" href="#" role="button">View details »</a>
        </div>
        @endforeach
      </div>
      <hr>
    </div>
@endsection