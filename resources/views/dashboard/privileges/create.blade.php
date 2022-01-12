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
          <form action="{{route('admin.privileges.store')}}" method="POST" enctype="multipart/form-data" >
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputName">Privilegien name:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{old('name')}}">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-7">
                <label for="inputRoute">Route:</label>
                <input type="text" name="route" class="form-control @error('route') is-invalid @enderror" id="inputRoute" value="{{old('route')}}">
                  @error('route')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
            @csrf
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i>Erstellen</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Card Row -->
  <!-- JS Footer Resources -->
  @section('content_js')
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                console.log(e.target.result);
            });
        });
    </script>
  @endsection

  @endsection
