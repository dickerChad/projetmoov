
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminMoov</title>

<link rel="stylesheet" href="{{mix("css/app.css")}}" />
@livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <x-topnav/>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">MoovProjet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("image/img.PNG")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->nom}} {{auth()->user()->prenom}}</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
     <x-menu/>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      
          {{-- <li class="nav-item"> --}}
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          {{-- </li> --}}
          
        

        @yield("contenu")

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
<x-sidebar/>
<!-- ./wrapper -->

<footer class="main-footer">
<div class="float-right d-none d-sm-inline">
  Proposé par Souleyman
</div>

<strong> Copyright :2021  MoovAfrica</strong>

</footer>
</div>


<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
