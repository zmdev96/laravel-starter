<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>{{ !empty($title) ? $title : 'Dashboard' }} </title>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" sizes="196x196" href="/assets/dashboard/dist/images/logo.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link href="{{ asset('/assets/dashboard/dist/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/assets/dashboard/dist/css/animate.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/assets/dashboard/dist/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/assets/dashboard/dist/vendor/nprogress/nprogress.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'" rel="stylesheet" type="text/css" />
  <!-- App Yield Styles -->
  @yield('content_css')
  <!-- App Runtime Styles -->
  @stack('runtime_css')
  <!-- App Min Style -->
  <link href="{{ asset('/assets/dashboard/dist/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
