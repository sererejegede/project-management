@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create Project</div>

          <div class="card-body">
            <form method="POST" action="{{ route('projects.store') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                  <input id="name" type="text"
                         class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
              </div>

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
              </div>

              <div class="form-group row">
                <label for="user_id"
                       class="col-md-4 col-form-label text-md-right">User</label>

                <div class="col-md-6">
                  <select id="user_id" class="form-control" name="user_id" required>
                    <option value="" disabled selected>--Select User--</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>

                  {{--@if ($errors->has('password'))--}}
                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                  {{--@endif--}}
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Create
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection