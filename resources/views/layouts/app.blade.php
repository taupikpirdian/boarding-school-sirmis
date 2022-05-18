<!DOCTYPE html>
<!-- Meta -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="author" content="Pesantren Sirnamiskin, Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235" />
<meta name="robots" content="" />
<meta name="description" content="Boarding School Pesantren Sirnamiskin, Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235" />
<meta name="format-detection" content="telephone=no">
<!-- Favicons Icon -->
<link rel="icon" href="frontend/images/favicon.html" type="image/x-icon" />
<link rel="shortcut icon" type="frontend/image/x-icon" href="images/favicon4.png" />
<!-- Page Title Here -->
<title>SIRMIS - Boarding School</title>
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Stylesheets -->
{!! Html::style('frontend/css/bootstrap.min.css') !!}
{!! Html::style('frontend/css/fontawesome/css/font-awesome.min.css') !!}
{!! Html::style('frontend/css/owl.carousel.css') !!}
{!! Html::style('frontend/css/bootstrap-select.min.css') !!}
{!! Html::style('frontend/css/magnific-popup.css') !!}
{!! Html::style('frontend/css/style.css') !!}
{!! Html::style('frontend/css/skin/skin-4.css') !!}
{!! Html::style('frontend/css/templete.css') !!}
{!! Html::style('frontend/css/switcher.css') !!}
<!-- Revolution Slider Css -->
{!! Html::style('frontend/revolution/css/settings.css') !!}
<!-- Revolution Navigation Style -->
{!! Html::style('frontend/revolution/css/navigation.css') !!}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('css')
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Roboto:100,300,400,500,700,900" rel="stylesheet"> 
</head>
<body id="bg">
<div class="page-wraper">
   <!-- header -->
    <header class="site-header header-style-1 dark">
        <!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="w3-topbar-left">
                        <ul> 
                        @guest
                        <li style="list-style: none; position: relative; top:1px;" ><a style="color: #fff" href="{{ url('/login') }}"><i class="fa fa-user-circle" style="position: relative; top:-2px;"></i>LOGIN </a></li>
                        <!--                             <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            @if(Auth::check())
                                @if(Auth::user()->groups()->where("name", "=", "Admin")->first())
                                    <li style="list-style: none; position: relative; top:1px;"><a style="color: #fff" href="{{ url('/@dmin-BS') }}"><i class="fa fa-user-circle" style="position: relative; top:-2px;"></i>Hi, {{ Auth::user()->name }} </a></li>
                                @else
                                    <li style="list-style: none; position: relative; top:1px;"><a style="color: #fff" href="{{ url('/dashboard-santri/'.Auth::user()->id) }}"><i class="fa fa-user-circle" style="position: relative; top:-2px;"></i>Hi, {{ Auth::user()->name }}</a></li>
                                @endif
                            @endif
                        @endguest
                        </ul>
                    </div>
					<div class="w3-topbar-right list-unstyled e-p-bx "> 
						<ul>
							<li><i class="fa fa-envelope"></i>pesantrensirnamiskin20@gmail.com</li>
							<li><i class="fa fa-phone"></i>+141 1234 567 890</li>
						</ul>	
					</div>
                </div>
            </div>
        </div>
        <!-- top bar END-->
        <!-- main header -->
        <div class="sticky-header header-curve main-bar-wraper">
            <div class="main-bar bg-primary clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion"><a href="{{ url('/') }}"><img src="frontend/images/logo.png" width="193" height="89" alt=""></a></div>
                    <!-- nav toggle button -->
                    <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                        @if(Auth::check())
                            @if(Auth::user()->groups()->where("name", "=", "Admin")->first())
                            @else
                            <a href="{{ url('/dashboard-santri/'.Auth::user()->id) }}" type="button" class="site-button white ">LENGKAPI DATA DISINI</a>
                            @endif
                        @else
                        <a href="{{ url('/register')}}" type="button" class="site-button white ">DAFTAR ONLINE</a>
                        @endif
                        </div>
                    </div>
                    
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse">
                        <ul class=" nav navbar-nav"><li class="active">
                         <a href="{{ url('/') }}">Home</i></a></li>

                            <li> <a href="javascript:;">Profil<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="{{ url('/sejarah-pesantren-sirnamiskin-bandung') }}">Sejarah</a> </li>
									<li> <a href="{{ url('/visi-misi-tujuan-pesantren-sirnamiskin-bandung') }}">Visi Misi & Tujuan</a></li>
                                </ul>
                            </li>
                            <li> <a href="javascript:;">Program<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/kegiatan-harian-santri-pesantren-sirnamiskin') }}">Kegiatan Harian</a></li>
									<li><a href="{{ url('/jadwal-kegiatan-santri-pesantren-sirmis') }}">Jadwal</a></li>
                                    <li> <a href="{{ url('/kitab-yang-wajib-dikuasai-santri-pesantren-sirnamiskin') }}">Kitab yang dipelajari</a></li>
									<li> <a href="{{ url('/target-pesantren-sirnamiskin-bandung') }}">Target</a></li>
                                </ul>
                            </li>
                            <li> <a href="{{ url('/galeri') }}">Galeri</a>
                            </li>
                            <li> <a href="javascript:;">Informasi<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="{{ url('/jadwal-pendaftaran') }}">Jadwal Pendaftaran</a></li>
                                    <li> <a href="{{ url('/persyaratan-pendaftaran-santri-pesantren-sirnamiskin') }}">Persyaratan</a></li>
								    <li> <a href="{{ url('/biaya-santri-pesantren-sirnamiskin') }}">Pembiayaan</a></li>
                                    <li> <a href="{{ url('/berita') }}">Berita</a>
                                </ul>
                            </li>
                           <li> <a href="javascript:;">Kepesantrenan<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/tatatertib') }}">Tata Tertib</a></li>
                                    <li> <a href="javascript:;">Organisasi</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/ketuakamar') }}">Ketua Kamar</a></li>
                                            <li><a href="{{ url('/pembimbing') }}">Pembimbing (Musyrif)</a></li>
                                            <li><a href="{{ url('/pembimbingbahasa') }}">Pembimbing Bahasa</a></li>
                                            <li><a href="{{ url('/pembimbingtahfidz') }}">Pembimbing Tahfidz</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
    @if (session('success'))
        <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Selamat!</strong> {{ session('success') }} </div>
    @endif
    @yield('content')
    <!-- Footer -->
    <footer class="site-footer footer-overlay bg-img-fix" style="background-image: url(frontend/images/background/bg1.jpg); background-position: center bottom; background-size: cover;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget widget_about">
                            <div class="logo-footer"><img src="frontend/images/Logofooter.png" alt=""></div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5025159735264!2d107.58504226414513!3d-6.949895219968707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8c7f42e3f19%3A0xef36624171a94af4!2sYPI%20Pondok%20Pesantren%20Sirnamiskin!5e0!3m2!1sen!2sid!4v1577884684104!5m2!1sen!2sid" width="250" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            <ul class="w3-social-icon border w3-social-icon-lg">
                                <li><a href="#" class="fa fa-facebook fb-btn"></a></li>
                                <li><a href="#" style="background-color:#3f729b" class="fa fa-instagram"></a></li>
								<li><a target="_blank" href="https://wa.me/6282214701040?text=Assalamualaikum, mau bertanya mengenai pesantren sirnamiskin bandung" style="background-color:#006400" class="fa fa-whatsapp link-btn"></a></li>
								<!-- <li><a href="javascript:void(0);" class="fa fa-twitter tw-btn"></a></li> -->
								<!-- <li><a href="javascript:void(0);" class="fa fa-linkedin link-btn"></a></li> -->
								<!-- <li><a href="javascript:void(0);" class="fa fa-pinterest-p pin-btn"></a></li> -->
							</ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget recent-posts-entry">
                            <h4 class="m-b15 text-uppercase">Berita</h4>
							<div class="w3-separator bg-primary"></div>
                            <div class="widget-post-bx">
                            @foreach($beritas as $i=>$berita)
                                <div class="widget-post clearfix">
                                    <div class="w3-post-media"> <img src="{{URL::asset('images/berita/thumbs/'.$berita->img)}}" alt="" width="200" height="143"> </div>
                                    <div class="w3-post-info">
                                        <div class="w3-post-header">
                                            <h6 class="post-title text-uppercase"><a href='{{URL::action("BeritaFrontController@index",array($berita->slug))}}'>{{ str_limit($berita->judul, 30) }}</a></h6>
                                        </div>
                                        <div class="w3-post-meta">
                                            <ul>
                                                <li class="post-author">By Admin</li>
                                                <!-- <li class="post-comment"><i class="fa fa-comments"></i> 28</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget widget_services">
                            <h4 class="m-b15 text-uppercase">Informasi</h4>
                            <div class="w3-separator bg-primary"></div>
                            <ul>
                                <li><a href="{{ url('/jadwal-pendaftaran') }}">Waktu Pendaftaran</a></li>
                                <li><a href="{{ url('/persyaratan-pendaftaran-santri-pesantren-sirnamiskin') }}">Persyaratan</a></li>
                                <li><a href="{{ url('/biaya-santri-pesantren-sirnamiskin') }}">Pembiayaan</a></li>
                                <li><a href="{{ url('/berita') }}">Berita</a></li>
                                <li><a href="#">Download Brosur</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget widget_getintuch">
                            <h4 class="m-b15 text-uppercase">Hubungi Kami</h4>
                            <div class="w3-separator bg-primary"></div>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><strong>alamat</strong> Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235</li>
                                <li><i class="fa fa-phone"></i><strong>telephone</strong>0800-123456 (24/7 Support Line)</li>
                                <li><i class="fa fa-fax"></i><strong>FAX</strong>(123) 123-4567<br/>000 123 2294 089</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left"> <span>© Copyright 2017</span> </div>
					<div class="col-md-4 text-center"> <span> Design With <i class="fa fa-heart text-primary heart"></i> By W3itexperts </span> </div>
					<!-- <div class="col-md-4 text-right "> <a href="about-2.html"> About</a> <a href="help.html"> Help Desk</a> <a href="privacy-policy.html"> Privacy Policy</a> </div> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END-->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
<!-- JavaScript  files ========================================= -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
{!! Html::script('frontend/js/jquery.min.js') !!}
<!-- jquery.min js -->
{!! Html::script('frontend/js/bootstrap.min.js') !!}
<!-- bootstrap.min js -->
{!! Html::script('frontend/js/bootstrap-select.min.js') !!}
<!-- Form js -->
{!! Html::script('frontend/js/jquery.bootstrap-touchspin.js') !!}
<!-- Form js -->
{!! Html::script('frontend/js/magnific-popup.js') !!}
<!-- magnific-popup js -->
{!! Html::script('frontend/js/waypoints-min.js') !!}
<!-- waypoints js -->
{!! Html::script('frontend/js/counterup.min.js') !!}
<!-- counterup js -->
{!! Html::script('frontend/js/imagesloaded.js') !!}
<!-- masonry  -->
{!! Html::script('frontend/js/masonry-3.1.4.js') !!}
<!-- masonry  -->
{!! Html::script('frontend/js/masonry.filter.js') !!}
<!-- masonry  -->
{!! Html::script('frontend/js/owl.carousel.js') !!}
<!-- OWL  Slider  -->
{!! Html::script('frontend/js/custom.js') !!}
<!-- custom fuctions  -->
{!! Html::script('frontend/js/dz.carousel.js') !!}
<!-- sortcode fuctions  -->
{!! Html::script('frontend/js/switcher.js') !!}
<!-- switcher fuctions  -->
<!-- revolution JS FILES -->
{!! Html::script('frontend/revolution/js/jquery.themepunch.tools.min.js') !!}
{!! Html::script('frontend/revolution/js/jquery.themepunch.revolution.min.js') !!}
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.actions.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.carousel.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.kenburn.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.migration.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.navigation.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.parallax.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.slideanims.min.js') !!}
{!! Html::script('frontend/revolution/js/extensions/revolution.extension.video.min.js') !!}
{!! Html::script('frontend/js/rev.slider.js') !!}
<script type="text/javascript">
jQuery(document).ready(function() {
	dz_rev_slider_2();
});	/*ready*/
</script>
<div id="loading-area"></div>
</body>
</html>
