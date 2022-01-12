@extends('admin.layouts.app')

@section('content')
    <!-- Css Header Resources -->
@section('content_css')
    <link href="{{ asset('assets/admin/dist/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/admin/dist/vendor/datatables/buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

<!-- Start Card Row -->
<div class="card main-card shadow mb-4">
    <div class="overflow">
        <i class="fas fa-sync-alt fa-spin"></i>
    </div>

    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        <div class="card-action">
            <a class="action-item  btn btn-primary btn-sm" href="{{ route('admin.privileges.create') }}"> <i
                        class="fas fa-user-plus fa-fw"></i></a>
            <button class="action-item  reload btn btn-success btn-sm"><i class="fas fa-sync-alt fa-fw"></i></button>
            <button class="action-item  filter btn btn-info btn-sm " type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i
                        class="fas fa-filter fa-fw"></i></button>
            <button class="action-item  option btn btn-secondary btn-sm"><i class="fas fa-ellipsis-v fa-fw"></i>
            </button>

        </div>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <h4>Filter options</h4>
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
            keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="card-body">
        <div class="messages">
            <p class="alert alert-success messages-info "></p>
        </div>
        @if (session()->has('message'))
            <div class="status-message alert alert-{{session()->get('status')}}">{{session()->get('message')}}</div>
        @endif
        <table id="users_table" class="table table-bordered " style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Privilege name</th>
                <th>Route</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-center">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($privileges as $privilege)
                    <tr>
                        <td>{{ $privilege->id }}</td>
                        <td>{{ $privilege->name }}</td>
                        <td>{{ $privilege->route }} </td>
                        <td>{{ $privilege->created_at->format('Y/m/d') }}</td>
                        <td>{{ $privilege->updated_at->format('Y/m/d') }}</td>
                        <td class="text-center">
                            <a class="btn btn-danger btn-sm" href=""
                               onclick="event.preventDefault(); document.getElementById('delete_form{{$privilege->id}}').submit();">
                                <i class="fas fa-trash fa-fw" ></i></a>
                            <a class="btn btn-success btn-sm" href="{{ route('admin.privileges.edit' , $privilege->id) }}"><i class="fas fa-edit fa-fw"></i></a>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.privileges.show' , $privilege->id) }}"><i class="fas fa-eye fa-fw"></i></a>
                            <form id="delete_form{{$privilege->id}}" action="{{ route('admin.privileges.destroy' , $privilege->id) }}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
<!-- End Card Row -->

<!-- JS Footer Resources -->
@section('content_js')
    <script src="{{ asset('assets/admin/dist/vendor/datatables/jquery.dataTables.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/dataTables.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/buttons/js/dataTables.buttons.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/buttons/js/buttons.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/pdfmake/pdfmake.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/buttons/js/buttons.html5.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/buttons/js/buttons.print.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/buttons/js/buttons.colVis.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/admin/dist/vendor/datatables/datatable.config.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var today = new Date();
        var date = today.getDate() + '.' + (today.getMonth() + 1) + '.' + today.getFullYear();
        $('#users_table').DataTable({
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: "Blfrtip",
            language: {
                url: "/assets/admin/dist/vendor/datatables/de.js",
            },
            buttons: [
                {extend: 'print', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4]}},
                {extend: 'copy', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4],}},
                {extend: 'pdf', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4],}},
                {extend: 'excel', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4],}},
                {extend: 'csv', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4],}},
                {extend: 'colvis', title: 'Admins-Privileges Liste ' + date, exportOptions: {columns: [0,1, 2, 3, 4],}},
            ],

        });
    </script>

@endsection

@endsection
