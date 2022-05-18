<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sirmis - Dashboard Admin</title>

  <!-- Favicons -->
  <link href="admin/img/favicon.png" rel="icon">
  <link href="admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  {!! Html::style('admin/lib/bootstrap/css/bootstrap.min.css') !!}
  <!--external css-->
  {!! Html::style('admin/lib/font-awesome/css/font-awesome.css') !!}
  {!! Html::style('admin/css/zabuto_calendar.css') !!}
  {!! Html::style('admin/lib/gritter/css/jquery.gritter.css') !!}
  <!-- Custom styles for this template -->
  {!! Html::style('admin/css/style.css') !!}
  {!! Html::style('admin/css/style-responsive.css') !!}
  {!! Html::script('admin/lib/chart-master/Chart.js') !!}

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{URL::to('/')}}" class="logo"><b>SIR<span>MIS</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="logout">Logout</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="admin/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a class="active" href="{{URL::to('/@dmin-BS')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Setup Role</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL::to('/roles')}}">List Roles</a></li>
              <li><a href="{{URL::to('/groups')}}">List Groups</a></li>
              <li><a href="{{URL::to('/user-groups')}}">List User Groups</a></li>
              <li><a href="{{URL::to('/group-roles')}}">List Group Roles</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Kategori</span>
              </a>
            <ul class="sub">
                <li><a href="{{URL::to('/kategori_berita/index')}}">Berita</a></li>
                <li><a href="{{URL::to('/kategori_galeri/index')}}">Galeri</a></li>
                <li><a href="{{URL::to('/kategori-kegiatan/index')}}">Kegiatan</a></li>
                <li><a href="{{URL::to('/kategori_lembaga/index')}}">Lembaga</a></li>
                <li><a href="{{URL::to('/kategori_visimisi/index')}}">Visi Misi</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Konten</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL::to('/berita/index')}}">Berita</a></li>
              <li><a href="{{URL::to('/pembiayaan/index')}}">Biaya</a></li>
              <li><a href="{{URL::to('/flow/index')}}">Flow Pendaftaran</a></li>
              <li><a href="{{URL::to('/galeri_pesantren/index')}}">Galeri</a></li>
              <li><a href="{{URL::to('/kegiatan/index')}}">Kegiatan</a></li>
              <li><a href="{{URL::to('/slider_sirmis/index')}}">Slider</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Profil</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL::to('/detail_lembaga/index')}}">Detail Lembaga</a></li>
              <li><a href="{{URL::to('/sejarah_sirmis/index')}}">Sejarah</a></li>
              <li><a href="{{URL::to('/tujuan_sirmis/index')}}">Tujuan</a></li>
              <li><a href="{{URL::to('/tentang-pesantren/index')}}">Tentang</a></li>
              <li><a href="{{URL::to('/visi_misi/index')}}">Visi & Misi</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Program</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL::to('/target_sirmis/index')}}">Target</a></li>
              <li><a href="{{URL::to('/jadwal_sirmis/index')}}">Jadwal</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Pendaftaran</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL::to('/pendaftaran_tsanawiyah/index')}}">Tsanawiyah</a></li>
              <li><a href="{{URL::to('/pendaftaran_aliyah/index')}}">Aliyah</a></li>
              <li><a href="{{URL::to('/persyaratan_pendaftaran/index')}}">Persyaratan</a></li>
              <li><a href="{{URL::to('/jadwal-pendaftaran/index')}}">Jadwal Pendaftaran</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        @yield('content')
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  {!! Html::script('admin/lib/jquery/jquery.min.js') !!}

  {!! Html::script('admin/lib/bootstrap/js/bootstrap.min.js') !!}
  {!! Html::script('admin/lib/jquery.dcjqaccordion.2.7.js') !!}
  {!! Html::script('admin/lib/jquery.scrollTo.min.js') !!}
  {!! Html::script('admin/lib/jquery.nicescroll.js') !!}
  {!! Html::script('admin/lib/jquery.sparkline.js') !!}
  <!--common script for all pages-->
  {!! Html::script('admin/lib/common-scripts.js') !!}
  {!! Html::script('admin/lib/gritter/js/jquery.gritter.js') !!}
  {!! Html::script('admin/lib/gritter-conf.js') !!}
  <!--script for this page-->
  {!! Html::script('admin/lib/sparkline-chart.js') !!}
  {!! Html::script('admin/lib/zabuto_calendar.js') !!}
  @yield('js')
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
