@extends('layouts.app')

@section('content')

  <!-- reply is indented -->
  {{--<div class="comment-reply col-md-11 offset-md-1 col-sm-10 offset-sm-2">--}}
    {{--<div class="row">--}}
      {{--<div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">--}}
        {{--<a href=""><img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="avatar"></a>--}}
      {{--</div>--}}
      {{--<div class="comment-content col-md-11 col-sm-10 col-12">--}}
        {{--<h6 class="small comment-meta"><a href="#">phildownney</a> Today, 12:31</h6>--}}
        {{--<div class="comment-body">--}}
          {{--<p>Really?? Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.--}}
            {{--<br>--}}
            {{--<a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>--}}
          {{--</p>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
  <!-- /reply is indented -->
    <!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container">
  <h1 class="display-3">{{ $project->name }}</h1>
  <p>{{ $project->description }}</p>
  {{--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a>--}}
</div>
    <div class="container">
      <!--


            Tasks go here
            {{--@foreach($company->projects as $project)--}}
      {{--<div class="col-md-4">--}}
      {{--<h2>{{ $project->name }}</h2>--}}
      {{--<p>{{ $project->description }}</p>--}}
      {{--<a class="btn btn-secondary" href="#" role="button">View details »</a>--}}
      {{--</div>--}}
      {{--@endforeach--}}


      -->
        {{--Comments--}}

      <hr>
    </div>
@endsection