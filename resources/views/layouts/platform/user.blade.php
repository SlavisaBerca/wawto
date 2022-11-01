<?php $gs=generalsetting();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$gs->site_title}}</title>
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{URL::to('platform/frontend/user/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}" alt="Wawto Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Acasa</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
	   <li class="nav-item d-none d-sm-inline-block">
                      <a href="{{ route('logout') }}" class="nav-link"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="sicon-logout position-relative">
                   
                </i>Logout
            </a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      </li>
	  @if($user->role)
		  <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Admin Panel</a>
      </li>
	  @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge counter"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header counter">{{$user->name}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('notifications')}}" class="dropdown-item">
            <i class="fas fa-bell mr-2 notification-counter" ></i>
            <span class="float-right text-muted text-sm">Vizualizare</span>
          </a>
          
         
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Contul Meu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if($user->profile_image)
          <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image)}}" class="img-circle elevation-2" alt="User Image">
          @else 
          <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image)}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('my-account')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Contul Meu
           
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{route('sent-requests')}}" class="nav-link">
                <i class="nav-icon fa fa-upload"></i>
              <p>
             Cereri Postate
                <span class="right badge badge-danger">{{$user->myrequest->count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('my-offers')}}" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
              <p>
                Oferte Primite
           
                <span class="badge badge-info right">{{$user->offerclient->count()}}</span>
              </p>
            </a>
          
        </li>
        <li class="nav-item">
            <a href="{{route('sent-commands')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Comenzi Trimise
           
                <span class="badge badge-info right">{{$user->commandclient->count()}}</span>
              </p>
            </a>
          
        </li>
         
        <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               Profil
               
             
              </p>
            </a>
          
        </li>
        @if($user->user_type===1 && $user->many_employees)
        <li class="nav-item">
          <a href="{{route('my-employees')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
           Angajati Firmei
             
           
            </p>
          </a>
        
      </li>
        
        @endif
        @if($user->user_type === 1 && $user->account_type ===1)
        <li class="nav-item">
          <a href="{{route('sent-offers')}}" class="nav-link">
              <i class="nav-icon fas fa-arrow-up"></i>
            <p>
              Oferte Trimise
         
              <span class="badge badge-info right">0</span>
            </p>
          </a>
        
      </li>
      <li class="nav-item">
        <a href="{{route('my-commands')}}" class="nav-link">
            <i class="nav-icon fas fa-download"></i>
          <p>
            Comenzi Primite
       
            <span class="badge badge-info right">{{$user->getcommand->count()}}</span>
          </p>
        </a>
      
    </li>

  

  <li class="nav-item">
    <a href="{{route('my-returs')}}" class="nav-link">
        <i class="nav-icon fas fa-download"></i>
      <p>
        Retur Primite
   
        <span class="badge badge-info right">{{$user->getretur->count()}}</span>
      </p>
    </a>
  
</li>
 </li>
  	  <li class="nav-item">
      <a href="{{route('user-incomes')}}" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
        <p>
         Rulaj pe Wawto Incasari
     
          <span class="badge badge-info right">{{$user->checkoutclient->count()}}</span>
        </p>
      </a>
    
  </li>
        @endif
		  <li class="nav-item">
      <a href="{{route('sent-returs')}}" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
        <p>
          Retur Trimise
     
          <span class="badge badge-info right">{{$user->sentretur->count()}}</span>
        </p>
      </a>
    
  </li>
  	  <li class="nav-item">
      <a href="{{route('user-payments')}}" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
        <p>
         Rulaj pe Wawto Platii
     
          <span class="badge badge-info right">{{$user->checkoutclient->count()}}</span>
        </p>
      </a>
    
  </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')


   <!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>Wawto Romania &copy; 2022 <a href="https://adminlte.io">Contul Meu Panoul de control</a>.</strong>
    Continut cu drepturi protejate.
    <div class="float-right d-none d-sm-inline-block">
      <b>Verisune</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL::to('platform/frontend/user/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::to('platform/frontend/user/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{URL::to('platform/frontend/user/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{URL::to('platform/frontend/user/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::to('platform/frontend/user/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{URL::to('platform/frontend/user/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::to('platform/frontend/user/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{URL::to('platform/frontend/user/plugins/moment/moment.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{URL::to('platform/frontend/user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{URL::to('platform/frontend/user/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{URL::to('platform/frontend/user/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('platform/frontend/user/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::to('platform/frontend/user/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::to('platform/frontend/user/dist/js/pages/dashboard.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/user/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@stack('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    (function worker() {
  $.ajax({
    url: '/refresh-notification-count', 
    success: function(data) {
      $('.counter').html(data);
      $('.notification-counter').html('Notificari '+data);
         getNotifications();
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(worker, 7000);
    }
  });
})();
function getNotifications(){
    $.ajax({
    url:'/json-notifications',
        success:function(data){
            
            var html='';
            
           
            for(var i=0; i<data.length; i++){
              html +=' <div class="post">';
               html +=' <div class="user-block">';
               html+='<img class="img-circle img-bordered-sm" src="../platform/frontend/assets/images/logo/{{$gs->site_logo}}" alt="user image">';    
			   html+='<span class="user-name">';
			   html+='<a href="">Wawto Robot</a>';
			   html+=' <a href="/hard-delete-notification/'+data[i].notification_id+'" class="float-right btn-tool"><i class="fas fa-times"></i></a>';
			   html+=' <span class="description">Primita - {{date('Y-m-d')}}</span> ';
			   html+='<p>'+data[i].notification+'</p>';
			   html+='</div>';
		   }
            $('#notifications').html(html);  
                   
                    
            
        }
   });
}
</script>

</body>
</html>
