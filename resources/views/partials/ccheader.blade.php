<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bidleo </title>


    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link active">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/customercare-items" class="nav-link">Items</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/customercare-auctions" class="nav-link">Auctions</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/customercare-users" class="nav-link">Users</a>
      </li>     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/logo/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" >
      <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Admin Dashboard</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/customercare-index" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>            
          </li>
                           
          <div class="info">
            <a href="#" class="d-block">Create</a>
          </div>  
          <li class="nav-item">
            <a href="/create-bid" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Create Item & Auction</p>
            </a>
          </li>
          
          <div class="info">
            <a href="#" class="d-block">Auctions</a>
          </div>
          <li class="nav-item">
            <a href="/active-auctions" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Active</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/past-auctions" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Past</p>
            </a>
          </li>         

          <div class="info">
            <a href="#" class="d-block">Bids</a>
          </div>  
          <li class="nav-item">
            <a href="/bike-bids" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Bikes</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/phone-bids" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Phones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/voucher-bids" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Vouchers</p>
            </a>
          </li>

          <div class="info">
            <a href="#" class="d-block">Users</a>
          </div> 
          <li class="nav-item">
            <a href="/active-users" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Active</p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="/flagged-users" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Flagged</p>
            </a>
          </li>      
         
          
                                       

          <li class="nav-header">Logout</li>
                                  

          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>