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
                    <form action="{{dashboard_route('hr.roles.update', $role->id)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputTitle">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" value="{{old('title', $role->title)}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-9">
                                <label for="inputName">Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{old('name', $role->name)}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="card col-md-12">
                                <div class="card-header  ">
                                    <h6 class="m-0 font-weight-400 text-primary">{{__('Role Permissions:')}}</h6>
                                </div>
                                <div class="card-body">

                                    @error('permissions')
                                    <div class="is-invalid p-2">
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                    </div>
                                    @enderror
                                    <div class="row">
                                        @foreach ($permissions as $group => $permission)

                                            <div class="col-3">
                                                <div class="card shadow mb-4 p-2">
                                                    <div class="card-header  ">
                                                        <h6 class="m-0 font-weight-400 text-primary">{{$group}}</h6>
                                                    </div>
                                                    @foreach($permission as $singel_permission)

                                                        <div class="singel-privi  ">
                                                            <input type="checkbox" name="permissions[]" value="{{$singel_permission->id}}" {{in_array($singel_permission->id, $role_permissions) ? 'checked' : ''}} id="{{$singel_permission->id}}">
                                                            <label for="{{$singel_permission->id}}">{{$singel_permission->title}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            @error('privi')
                            <span class="invalid-feedback-check" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                            @enderror
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
