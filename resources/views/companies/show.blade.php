@extends('layouts.app')

@section('content')

  <div class="modal fade" id="projectCreateModal" tabindex="-1" role="dialog" aria-labelledby="projectCreateModalTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="projectCreateModalTitle">Create Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('projects.store') }}">
          <div class="modal-body">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                <input id="name" type="text"
                       class="form-control" name="name" value="{{ old('name') }}" required autofocus>
              </div>
            </div>{{--Name--}}

            <div class="form-group row">
              <label for="description"
                     class="col-md-4 col-form-label text-md-right">Description</label>

              <div class="col-md-6">
                <textarea id="description" class="form-control" name="description" required></textarea>

                {{--@if ($errors->has('email'))--}}
                {{--<span class="invalid-feedback">--}}
                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
              </div>
            </div>{{--Description--}}

            <div class="form-group row">
              <label for="days"
                     class="col-md-4 col-form-label text-md-right">Days</label>

              <div class="col-md-6">
                <input id="days" class="form-control" name="days" type="number" required>

                {{--@if ($errors->has('email'))--}}
                {{--<span class="invalid-feedback">--}}
                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
              </div>
            </div>{{--Days--}}

            <input type="hidden" name="company_id" value="{{ $company->id }}">{{--Company Id--}}
            <input type="hidden" name="user_id" value="{{ $company->user_id }}">{{--User Id--}}

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-out-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="companyEditModal" tabindex="-1" role="dialog" aria-labelledby="companyEditModalTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="companyEditModalTitle">Edit Company</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('companies.update', [$company->id]) }}">
          <div class="modal-body">
            @method('PUT')
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                <input id="name" type="text"
                       class="form-control" name="name" value="{{ $company->name }}" required autofocus>
              </div>
            </div>{{--Name--}}

            <div class="form-group row">
              <label for="description"
                     class="col-md-4 col-form-label text-md-right">Description</label>

              <div class="col-md-6">
                <textarea id="description" class="form-control" name="description" required>{{ $company->description }}</textarea>

                {{--@if ($errors->has('email'))--}}
                {{--<span class="invalid-feedback">--}}
                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                {{--</span>--}}
                {{--@endif--}}
              </div>
            </div>{{--Description--}}

            {{--<div class="form-group row">--}}
              {{--<label for="days"--}}
                     {{--class="col-md-4 col-form-label text-md-right">Days</label>--}}

              {{--<div class="col-md-6">--}}
                {{--<input id="days" class="form-control" name="days" type="number" required>--}}
              {{--</div>--}}
            {{--</div>--}}{{--Days--}}

            {{--<input type="hidden" name="company_id" value="{{ $company->id }}">--}}{{--Company Id--}}
            <input type="hidden" name="user_id" value="{{ $company->user_id }}">{{--User Id--}}

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-out-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="jumbotron">
      <h3 class="display-3">{{ $company->name }}</h3>
      <p>{{ $company->description }}</p>
      <div class="float-right">
        <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#companyEditModal">Edit</a>
        {{--<a class="btn btn-danger btn-sm"--}}
           {{--onclick=" if ( confirm('Are you sure you want to delete this Company? \n You can\'t revert this action!')){--}}
             {{--document.getElementById('company_delete').submit();--}}
         {{--}">Delete</a>--}}
      </div>


      {{--<form id="company_delete" action="{{ route('companies.destroy', [$company->id]) }}" method="post" style="display: none">--}}
        {{--@csrf--}}
        {{--@method('delete')--}}
      {{--</form>--}}
    </div>
    <!-- Example row of columns -->
    <div class="card-deck">
      @foreach($company->projects as $project)
        <div class="card hover">
          <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->description }}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">
              <a class="blockquote blockquote-footer card-link" href="#" role="button">View details »</a>
              <a class="btn btn-danger text-white btn-sm float-right"
                 onclick=" if ( confirm('Are you sure you want to delete {{ $project->name }}? \n You can\'t revert this action!')){
                         document.getElementById('project_delete_{{ $project->id }}').submit();
                         }">
                Delete
              </a>
            </small>
          </div>
        </div>
        <form id="project_delete_{{ $project->id }}" action="{{ route('projects.destroy', [$project->id]) }}" method="post"
                    style="display: none">
          @csrf
          @method('delete')
        </form>
      @endforeach

    </div>

    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#projectCreateModal">
      Add Project
    </button>
  </div>
@endsection