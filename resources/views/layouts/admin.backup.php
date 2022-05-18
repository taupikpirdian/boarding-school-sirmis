<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('dist/css/skins/_all-skins.min.css') !!}
  <!-- Morris chart -->
  {!! Html::style('bower_components/morris.js/morris.css') !!}
  <!-- jvectormap -->
  {!! Html::style('bower_components/jvectormap/jquery-jvectormap.css') !!}
  <!-- Date Picker -->
  {!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  <!-- Daterange picker -->
  {!! Html::style('bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  <!-- bootstrap wysihtml5 - text editor -->
  {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{'/'}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{URL::asset('/assets/images/logo_admin.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{URL::asset('/assets/images/logo_admin.png')}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                <small>Boarding School Pesantren Sirnamiskin</small>
                </p>
              </li>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>

              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('/assets/images/logo_admin.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
          <div style="height: 40px"></div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
<!--         <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>ADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL::to('/user_sirmis/index')}}"><i class="fa fa-circle-o"></i>Users</a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/roles')}}"><i class="fa fa-circle-o text-yellow"></i>List Roles</a></li>
            <li><a href="{{URL::to('/groups')}}"><i class="fa fa-circle-o text-yellow"></i>List Groups</a></li>
            <li><a href="{{URL::to('/user-groups')}}"><i class="fa fa-circle-o text-yellow"></i>List User Groups</a></li>
            <li><a href="{{URL::to('/group-roles')}}"><i class="fa fa-circle-o text-yellow"></i>List Group Roles</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span> STATISTIK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL::to('/statistik-tsanawiyah')}}"><i class="fa fa-circle-o text-aqua"></i> DATA MTS</a></li>
            <li><a href="{{URL::to('/statistik-aliyah')}}"><i class="fa fa-circle-o text-aqua"></i> DATA ALIYAH</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span> HOME</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="{{URL::to('/lokasi_sirmis/index')}}"><i class="fa fa-circle-o text-red"></i> LOKASI</a></li> -->
            <li><a href="{{URL::to('/slider_sirmis/index')}}"><i class="fa fa-circle-o text-red"></i> SLIDER</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>PROFIL</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- LEVEL -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> DETAIL LEMBAGA
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('/detail_lembaga/index')}}"><i class="fa fa-circle-o text-red"></i> DETAIL LEMBAGA</a></li>
                <li><a href="{{URL::to('/kategori_lembaga/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI</a></li>
              </ul>
            </li>
            <!-- END LEVEL -->
            <!-- LEVEL -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> VISI MISI
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('/visi_misi/index')}}"><i class="fa fa-circle-o text-red"></i> VISI & MISI</a></li>
                <li><a href="{{URL::to('/kategori_visimisi/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI</a></li>
              </ul>
            </li>
            <!-- END LEVEL -->
            <!-- LEVEL -->
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> PIMPINAN
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('/pimpinan_lembaga/index')}}"><i class="fa fa-circle-o text-red"></i> PIMPINAN</a></li>
                <li><a href="{{URL::to('/kategori_pimpinan/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI</a></li>
              </ul>
            </li> -->
            <!-- END LEVEL -->
            <li><a href="{{URL::to('/sejarah_sirmis/index')}}"><i class="fa fa-circle-o text-aqua"></i> SEJARAH</a></li>
            <li><a href="{{URL::to('/tujuan_sirmis/index')}}"><i class="fa fa-circle-o text-aqua"></i> TUJUAN</a></li>
            <li><a href="{{URL::to('/tentang-pesantren/index')}}"><i class="fa fa-circle-o text-aqua"></i> TENTANG</a></li>
            <!-- <li><a href="{{URL::to('/struktur_sirmis/index')}}"><i class="fa fa-circle-o text-aqua"></i> STRUKTUR</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> EKSTRAKULIKULER</a></li> -->
            <!-- <li><a href="{{URL::to('/prestasi_sirmis/index')}}"><i class="fa fa-circle-o text-aqua"></i> PRESTASI</a></li> -->
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span> PROGRAM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/target_sirmis/index')}}"><i class="fa fa-circle-o text-aqua"></i> TARGET</a></li>
            <li><a href="{{URL::to('/jadwal_sirmis/index')}}"><i class="fa fa-circle-o text-aqua  "></i> JADWAL</a></li>
          </ul>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span> PENGAJAR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> ATRIBUT
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('/status_guru/index')}}"><i class="fa fa-circle-o text-red"></i> STATUS</a></li>
                <li><a href="{{URL::to('/kategori_guru/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI</a></li>
                <li><a href="{{URL::to('/matpel/index')}}"><i class="fa fa-circle-o text-red"></i> MATA PELAJARAN</a></li>
              </ul>
            </li>
            <li><a href="{{URL::to('biodata_guru_pesantren/index')}}"><i class="fa fa-circle-o text-aqua"></i> GURU</a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>GALERI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- LEVEL -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> ATRIBUT
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('/kategori_galeri/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI</a></li>
              </ul>
            </li>
            <li><a href="{{URL::to('/galeri_pesantren/index')}}"><i class="fa fa-circle-o text-aqua"></i> PHOTO KEGIATAN</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>INFORMASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- LEVEL -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> ATRIBUT
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="{{URL::to('/kategori_acara/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI ACARA</a></li> -->
                <!-- <li><a href="{{URL::to('/kategori_artikel/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI ARTIKEL</a></li> -->
                <li><a href="{{URL::to('/kategori_berita/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI BERITA</a></li>
                <li><a href="{{URL::to('/kategori-kegiatan/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI KEGIATAN</a></li>
                <!-- <li><a href="{{URL::to('/kategori_testimoni/index')}}"><i class="fa fa-circle-o text-red"></i> KATEGORI TESTIMONI</a></li> -->
              </ul>
            </li>
            <!-- <li><a href="{{URL::to('/acara/index')}}"><i class="fa fa-circle-o text-aqua"></i>ACARA</a></li>
            <li><a href="{{URL::to('/artikel/index')}}"><i class="fa fa-circle-o text-aqua"></i>ARTIKEL</a></li> -->
            <li><a href="{{URL::to('/berita/index')}}"><i class="fa fa-circle-o text-aqua"></i>BERITA</a></li>
            <li><a href="{{URL::to('/pembiayaan/index')}}"><i class="fa fa-circle-o text-aqua"></i>BIAYA</a></li>
            <li><a href="{{URL::to('/kegiatan/index')}}"><i class="fa fa-circle-o text-aqua"></i>KEGIATAN</a></li>
            <!-- <li><a href="{{URL::to('/testimoni/index')}}"><i class="fa fa-circle-o text-aqua"></i>TESTIMONI</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>PENDAFTARAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- LEVEL -->
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-red"></i> ATRIBUT
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/jenis_kelamin/index"><i class="fa fa-circle-o text-red"></i> JENIS KELAMIN</a></li>
                <li><a href="/mondok_sirmis/index"><i class="fa fa-circle-o text-red"></i> MONDOK</a></li>
                <li><a href="/ukuran_seragam/index"><i class="fa fa-circle-o text-red"></i> UKURAN SERAGAM</a></li>
                <li><a href="/pekerjaan_ortu/index"><i class="fa fa-circle-o text-red"></i> PEKERJAAN ORANG TUA</a></li>
                <li><a href="/penghasilan_ortu/index"><i class="fa fa-circle-o text-red"></i> PENGHASILAN ORANG TUA</a></li>
                <li><a href="/pendidikan_ortu/index"><i class="fa fa-circle-o text-red"></i> PENDIDIKAN ORANG TUA</a></li>
              </ul>
            </li> -->
            <li class="active"><a href="{{URL::to('/pendaftaran_tsanawiyah/index')}}"><i class="fa fa-circle-o text-aqua"></i>TSANAWIYAH</a></li>
            <li><a href="{{URL::to('/pendaftaran_aliyah/index')}}"><i class="fa fa-circle-o text-aqua"></i>ALIYAH</a></li>
            <li><a href="{{URL::to('/persyaratan_pendaftaran/index')}}"><i class="fa fa-circle-o text-aqua"></i>PERSYARATAN</a></li>
            <li><a href="{{URL::to('/jadwal-pendaftaran/index')}}"><i class="fa fa-circle-o text-aqua"></i>JADWAL PENDAFTARAN</a></li>
          </ul>
        </li>

        <li class="header">KETERANGAN</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>PENTING</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>PERINGATAN </span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>INFORMASI</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

      @yield('content')

    </section>
      
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script('bower_components/jquery-ui/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
{!! Html::script('bower_components/raphael/raphael.min.js') !!}
{!! Html::script('bower_components/morris.js/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
<!-- daterangepicker -->
{!! Html::script('bower_components/moment/min/moment.min.js') !!}
{!! Html::script('bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! Html::script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('dist/js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('dist/js/demo.js') !!}

@yield('js')
</body>
</html>
