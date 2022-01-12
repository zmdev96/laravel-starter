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

    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <div class="form-content">
                    <form action="{{route('admin.admin-groups.update', $group->id)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputName">Gruppename:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="inputName" value="{{old('name', $group->name)}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-9">
                                <label for="inputDesc">Beschreibung:</label>
                                <input type="text" name="desc" class="form-control @error('desc') is-invalid @enderror"
                                       id="inputDesc" value="{{old('desc', $group->desc)}}">
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="row">
                                @foreach ($privileges as $privi)
                                    <div class="col-2">
                                        <div class="singel-privi  ">
                                            <input type="checkbox" name="privi[]" value="{{$privi->id}}" id="{{$privi->id}}" {{ in_array($privi->id , $groupPrivilegesIDs) ? 'checked' : ''}}>
                                            <label for="{{$privi->id}}">{{$privi->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                                @error('privi')
                                <span class="invalid-feedback-check" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @csrf
                        {{method_field('PUT')}}

                        <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;"
                                                                                       class="fas fa-plus"></i>Aktualisieren
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
