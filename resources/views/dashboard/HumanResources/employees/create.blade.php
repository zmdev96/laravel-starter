@extends('admin.layouts.app')

@section('content')
<!-- Css Header Resources -->
@section('content_css')


@endsection

<!-- Start Card Row -->
<div class="card shadow mb-4">
  <div class="card-header  d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Administrator erstellen</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <div class="form-content">
          <form action="{{route('admin.admins.store')}}" method="POST" enctype="multipart/form-data" >
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="inputUsername" value="{{old('username')}}">

              </div>
              <div class="form-group col-md-3">
                <label for="inputFirst_Name">Firstname</label>
                <input type="text" name="firstname" class="form-control" id="inputFirst_Name" value="{{old('firstname')}}">

              </div>
              <div class="form-group col-md-3">
                <label for="inputFirst_Name">Lastname</label>
                <input type="text" name="lastname" class="form-control" id="inputFirst_Name" value="{{old('lastname')}}">

              </div>
              <div class="form-group col-md-3">
                <label for="inputImage">Image</label>
                <input type="file" name="image" class="form-control" id="inputImage">

              </div>
            </div>
            {!!csrf_field()!!}
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i>Create</button>
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
