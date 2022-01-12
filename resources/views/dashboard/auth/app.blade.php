<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{ !empty($title) ? $title : 'Laravel8' }} </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" sizes="196x196" href="/assets/dashboard/dist/images/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('assets/dashboard/dist/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dashboard/dist/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dashboard/dist/css/auth.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
@yield('content')
</body>
<script src="{{ asset('assets/dashboard/dist/vendor/jquery/jquery3.4.1.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    // Login page
    $('.login-submit').click(function (){
        $(this).find('i').removeClass('fa-sign-out-alt');
        $(this).find('i').addClass('fa-spinner fa-spin');
    });
    // Email page
    $('.email-submit').click(function (){
        $(this).find('i').removeClass('fas fa-paper-plane');
        $(this).find('i').addClass('fa fa-spinner fa-spin');
    });
</script>
</html>
