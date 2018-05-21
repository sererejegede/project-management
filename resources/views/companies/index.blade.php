@extends('layouts.app')

@section('content')

  <div class="modal fade" id="companyCreateModal" tabindex="-1" role="dialog" aria-labelledby="companyCreateModalTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="companyCreateModalTitle">Create Company</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('companies.store') }}">
          @csrf

          <div class="modal-body">
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

            {{--<div class="form-group row">--}}
            {{--<label for="user_id"--}}
            {{--class="col-md-4 col-form-label text-md-right">User</label>--}}

            {{--<div class="col-md-6">--}}
            {{--<select id="user_id" class="form-control" name="user_id" required>--}}
            {{--<option value="" disabled selected>--Select User--</option>--}}
            {{--@foreach($users as $user)--}}
            {{--<option value="{{ $user->id }}">{{ $user->name }}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div>--}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-out-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-header bg-secondary text-white">
          Companies
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            @foreach($companies as $company)
              <li class="list-group-item">
                <a href="companies/{{ $company->id }}">{{ $company->name }}</a>
                <a class="btn btn-danger text-white btn-sm float-right"
                   onclick=" if ( confirm('Are you sure you want to delete {{ $company->name }}? \n You can\'t revert this action!')){
                           document.getElementById('company_delete_{{ $company->id }}').submit();
                           }">
                  Delete

                </a>
              </li>
              <form id="company_delete_{{ $company->id }}" action="{{ route('companies.destroy', [$company->id]) }}" method="post"
                    style="display: none">
                @csrf
                @method('delete')
              </form>
            @endforeach
          </ul>
          <button type="button" class="btn btn-primary float-right my-5" data-toggle="modal"
                  data-target="#companyCreateModal">
            Add New
          </button>
          {{--<a href="{{ route('companies.create') }}" class="btn btn-info float-right">Add New</a>--}}
        </div>
      </div>
    </div>
  </div>
@endsection