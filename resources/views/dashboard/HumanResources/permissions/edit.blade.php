@extends('dashboard.layouts.app')

@section('content')
<!-- Css Header Resources -->
@section('content_css')


@endsection

<!-- Start Card Row -->
<div class="card shadow mb-4">
  <div class="card-header  d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Users Edit</h6>
  </div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="status-message alert alert-{{session()->get('status')}}">{{session()->get('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-9">
                <div class="form-content">
                    <form action="{{dashboard_route('hr.permissions.update', $permission->id)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputTitle">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" value="{{old('title', $permission->title)}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-9">
                                <label for="inputName">Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{old('name', $permission->name)}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputGroupName">Permission group:</label>
                                <select name="permission_group_id" id="permission_group_id" class="form-control @error('permission_group_id') is-invalid @enderror">
                                    <option value="">Choose group...</option>
                                    @foreach($permission_groups as $id => $name)
                                        <option value="{{$id}}" {{$permission->group_id == $id ? 'selected' : ''}}>{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @csrf
                        @method('PUT')
                        <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i>Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- End Card Row -->
<!-- JS Footer Resources -->
@section('content_js')

@endsection

@endsection
