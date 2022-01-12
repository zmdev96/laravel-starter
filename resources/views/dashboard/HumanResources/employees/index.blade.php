@extends('dashboard.layouts.app')

@section('content')
    <!-- Css Header Resources -->
@section('content_css')
    <link href="{{ asset('/assets/dashboard/dist/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

<!-- Start Card Row -->
<div class="card main-card shadow mb-4">
    <div class="overflow">
        <i class="fas fa-sync-alt fa-spin"></i>
    </div>

    <div class="card-header  d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Users Manage</h6>
        <div class="card-action">
            <a class="action-item  btn btn-primary btn-sm" href="{{ dashboard_route('hr.employees.create') }}"> <i
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
        <table id="users_table" class="table table-bordered " style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-center">Actions</th>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Zzz</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </tbody>

        </table>
    </div>
</div>
<!-- End Card Row -->

<!-- JS Footer Resources -->
@section('content_js')
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/jquery.dataTables.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/dataTables.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/js/dataTables.buttons.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/js/buttons.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/pdfmake/pdfmake.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/js/buttons.html5.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/js/buttons.print.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/buttons/js/buttons.colVis.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/assets/dashboard/dist/vendor/datatables/datatable.config.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var today = new Date();
        var date = today.getDate() + '.' + (today.getMonth() + 1) + '.' + today.getFullYear();
        $('#users_table').DataTable({
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: "Blfrtip",

            buttons: [
                {extend: 'print', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7]}},
                {extend: 'copy', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7],}},
                {extend: 'pdf', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7],}},
                {extend: 'excel', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7],}},
                {extend: 'csv', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7],}},
                {extend: 'colvis', title: 'Admins Liste ' + date, exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7],}},
            ],

        });
    </script>

@endsection

@endsection
