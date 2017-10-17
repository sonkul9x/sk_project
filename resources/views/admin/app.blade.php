
<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="{!! asset('public/admin') !!}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{!! asset('public/admin') !!}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{!! asset('public/admin') !!}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{!! asset('public/admin') !!}/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a  class="navbar-brand"  href="{!! route('dashboard') !!}">SK DEV - Admin Dashboard Ver 1.0.0</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{!! route('dashboard') !!}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="News">
          <a class="nav-link  nav-link-collapse collapsed"  data-toggle="collapse" href="#new2" data-parent="#exampleAccordion">
            <i class="fa fa-pencil-square" aria-hidden="true"></i>
            <span class="nav-link-text">News</span>
          </a>
           <ul class="sidenav-second-level collapse" id="new2">
            <li>
              <a href="{!! route('getNewList') !!}">List New</a>
            </li>
            <li>
              <a href="{{ route('getCatList') }}">Category</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link  nav-link-collapse collapsed"  data-toggle="collapse" href="#user2" data-parent="#exampleAccordion">
             <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Users</span>
          </a>
           <ul class="sidenav-second-level collapse" id="user2">
            <li>
              <a href="{!! route('getUserList') !!}">List User</a>
            </li>
            <li>
              <a href="{!! route('getUserGroup') !!}">User Groups</a>
            </li>
            @if(config('constants.ACTIVE_PER') == 1)
            <li>
              <a href="{!! route('getUserPer') !!}">User Groups Permistion *</a>
            </li>
             @endif
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pages">
          <a class="nav-link" href="{!! route('getPageList') !!}">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            <span class="nav-link-text">Pages</span>
          </a>       
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link" href="#">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="nav-link-text">Products</span>
          </a>       
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
          <a class="nav-link" href="#">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="nav-link-text">Orders</span>
          </a>       
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contacts">
          <a class="nav-link" href="#">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            <span class="nav-link-text">Contacts</span>
          </a>       
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
          <a class="nav-link" href="#">
             <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="nav-link-text">Customers</span>
          </a>       
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu">
          <a class="nav-link" href="#">
             <i class="fa fa-bars" aria-hidden="true"></i>
            <span class="nav-link-text">Menu</span>
          </a>
         
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#setting2" data-parent="#exampleAccordion">
             <i class="fa fa-cog" aria-hidden="true"></i>
            <span class="nav-link-text">Settings</span>
          </a>
             <ul class="sidenav-second-level collapse" id="setting2">
            <li>
              <a href="{!! route('FileManager') !!}">Media</a>
            </li>
            
          </ul>
        </li>       
       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item">
          
            <a class="nav-link" href="{{URL::asset('')}}language/vi"><img src="{!! asset('public/admin/images/icon-vn.png') !!}"
                                                                 alt=""> Vietnamese</a>
            
        </li>
         <li class="nav-item"><a class="nav-link"  href="{{URL::asset('')}}language/en"><img src="{!! asset('public/admin/images/icon-us.png') !!}"
                                                                 alt=""> English</a></li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>            
          </div>
        </li>  
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">{!! __('label.hello') !!} <b>{{ $user_curent_login = Auth::user()->fullname }}</b>, Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a href="{!! route('getLogout') !!}" class="btn btn-primary">{!! __('label.logout') !!}</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{!! asset('public/admin') !!}/vendor/jquery/jquery.min.js"></script>
    <script src="{!! asset('public/admin') !!}/vendor/popper/popper.min.js"></script>
    <script src="{!! asset('public/admin') !!}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{!! asset('public/admin') !!}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{!! asset('public/admin') !!}/vendor/chart.js/Chart.min.js"></script>
    <script src="{!! asset('public/admin') !!}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{!! asset('public/admin') !!}/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{!! asset('public/admin') !!}/js/sb-admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="{!! asset('public/admin') !!}/js/sb-admin-datatables.min.js"></script>
    @yield('script')
  </div>
</body>

</html>