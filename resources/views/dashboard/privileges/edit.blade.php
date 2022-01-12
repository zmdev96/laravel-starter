@extends('admin.layouts.app')

@section('content')
    <!-- Css Header Resources -->
@section('content_css')


@endsection

<!-- Start Card Row -->
<div class="card shadow mb-4">
    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
    </div>
    @if (session()->has('message'))
        <div class="status-message alert alert-{{session()->get('status')}}">{{session()->get('message')}}</div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <div class="form-content">
                    <form action="{{route('admin.privileges.update', $privilege->id)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputName">Privilegien name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{old('name', $privilege->name)}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-9">
                                <label for="inputRoute">Route:</label>
                                <input type="text" name="route" class="form-control @error('route') is-invalid @enderror" id="inputRoute" value="{{old('route', $privilege->route)}}">
                                @error('route')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @csrf
                        {{method_field('PUT')}}

                        <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i>Aktualisieren
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
