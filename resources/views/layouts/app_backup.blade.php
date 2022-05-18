<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boarding School | Sirmis</title>

    <!-- Styles -->
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/welcome.css') !!}
    {!! Html::style('css/slider.css') !!}
    {!! Html::style('css/responsiveslides.css') !!}
    {!! Html::style('css/sejarah.css') !!}
    {!! Html::style('css/visimisi.css') !!}
    {!! Html::style('css/tujuan.css') !!}
    {!! Html::style('css/struktur.css') !!}
    {!! Html::style('css/kegiatan_harian.css') !!}
    {!! Html::style('css/target.css') !!}
    {!! Html::style('css/kitab.css') !!}
    {!! Html::style('/front/css/style.css') !!}
    {!! Html::style('/front/css/color.css') !!}
    {!! Html::style('/css/persyaratan.css') !!}
    {!! Html::style('/css/map.css') !!}
    {!! Html::style('css/biodatagurumts.css') !!}
    {!! Html::style('css/home_guru.css') !!}
    {!! Html::style('css/biodatagurualiyah.css') !!}
    {!! Html::style('css/galeri.css') !!}
    {!! Html::style('css/artikel_detail.css') !!}
    {!! Html::style('css/berita_detail.css') !!}
    {!! Html::style('css/acara_detail.css') !!}
    {!! Html::style('css/image_galeri.css') !!}
    {!! Html::style('css/artikel.css') !!}
    {!! Html::style('css/berita.css') !!}
    {!! Html::style('css/pendaftaran_tsanawiyah.css') !!}
    {!! Html::style('css/loader.css') !!}
    {!! Html::style('css/acara.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/sosial.css') !!}
    {!! Html::style('css/button.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
    .btn-1 {
        background-color: green;
        border: none;
        color: white;
        padding: 10px 28px;
        margin: 10px;
        font-size: 16px;
        cursor: pointer;
        font-size: 15px;
        border-radius: 4px;
    }

    /* Darker background on mouse-over */
    .btn-1:hover {
        background-color: #1F1F1F;
    }
</style>

</head>
<body>

    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

        <div class="loader-title">
            <b>Boarding School</b><br>
            <span class="loader-title2">Pesantren Sirnamiskin</span>
        </div>
    </div>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px;">
            <div class="container">
                <div class="navbar-header" style="height: 50px">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img style="width: 30%" class="logo" src="/assets/images/logo1.png">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="text-align: left;">
                        <li><a style="color: #118345;" href="{{ url('/') }}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/sejarah_sirmis')}}">Sejarah</a></li>
                                <li><a href="{{ url('/visimisi') }}">Visi dan Misi</a></li>
                                <li><a href="{{ url('/tujuan_sirmis') }}">Tujuan</a></li>
                                <li><a href="{{ url('/struktur-pesantren') }}">Struktur</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Program <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/jadwal-sirmis') }}">Jadwal</a></li>
                                <li><a href="{{ url('/kegiatan-harian') }}">Kegiatan Harian</a></li>
                                <li><a href="{{ url('/target') }}">Target</a></li>
                                <li><a href="{{ url('/penguasaan-kitab') }}">Penguasaan Kitab</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Direktori <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/direktori-pesantren') }}">Pesantren</a></li>
                                <li><a href="{{ url('/direktori-tsanawiyah') }}">Madrasah Tsanawiyah</a></li>
                                <li><a href="{{ url('/direktori-aliyah') }}">Madrasah Aliyah</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/galeri-pesantren') }}">Pesantren</a></li>
                                <li><a href="{{ url('/galeri-aliyah') }}">Madrasah Aliyah</a></li>
                                <li><a href="{{ url('/galeri-mts') }}">Madrasah Tsanawiyah</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/acara') }}">Acara</a></li>
                                <li><a href="{{ url('/artikel') }}">Artikel</a></li>
                                <li><a href="{{ url('/berita') }}">Berita</a></li>
                                <li><a href="{{ url('/prestasi-sirmis') }}">Prestasi</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pendaftaran <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/pendaftaran-tsanawiyah/create') }}">Madrasah Tsanawiyah</a></li>
                                <li><a href="{{ url('/pendaftaran-aliyah/create') }}">Madrasah Aliyah</a></li>
                                <li><a href="{{ url('/persyaratan') }}">Persyaratan</a></li>
                            </ul>
                        </li>

                        <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @guest
                        <li><a style="color: #118345;" href="{{ route('login') }}">Login</a></li>
                        <!--                             <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('/@dmin-BS') }}">Dashboard</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<footer>

    <div class="lates_news_on">
        <p class="title_footer_on">BERITA TERBARU</p>
        @foreach($berita as $i=>$beritas)
        <div class="desc_box_on">      
            <p><a class="desc_box_on_title" href="/berita/{{$beritas->id}}">{{ $beritas->judul }}</a></p>
            <hr style="margin:10px 10px 20px 10px; border: #fff dashed 0.5px; position: relative;top: 10px">
        </div>
        @endforeach
    </div>

    <div class="lates_news_on">
        <p class="title_footer_on">ACARA TERBARU</p>
        @foreach($acara as $i=>$acaras)
        <div class="desc_box_on">      
            <p><a class="desc_box_on_title" href="/acara/{{ $acaras->id }}">{{ $acaras->judul }}</a></p>
            <hr style="margin:10px 10px 20px 10px; border: #fff dashed 0.5px; position: relative;top: 10px">
        </div>
        @endforeach
    </div>

    

    <div class="about_us">
        <p class="title_footer_on">KONTAK KAMI</p>
        <ul>
            @if(!empty($lokasi_sirmis))
            <li style="color: #fff">{{ $lokasi_sirmis->alamat }}</li>
            <li style="color: #fff">{{ $lokasi_sirmis->kontak }}</li>
            <li style="color: #fff">{{ $lokasi_sirmis->email }}</li>
            @endif  
        </ul>
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.3717642309994!2d107.585558218804!3d-6.949980473099771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8c7f42e3f19%3A0xef36624171a94af4!2sYPI+Pondok+Pesantren+Sirnamiskin!5e0!3m2!1sen!2sid!4v1517559043572" frameborder="1" style="border:0" allowfullscreen></iframe>
    </div>

    
</footer>

<div class="sosial-media">
    <button class="button button1"><a class="download-button" href="{{URL::to('/assets/file/brosur_sirmis.pdf')}}">DOWNLOAD BROSUR</a></button>
    <ul id="sosial">
        <li class="media1"><a class="media2" href="#"><i class="#" aria-hidden="true"></i></a></li>
        <li class="media"><a class="media2" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li class="media"><a class="media2" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li class="media"><a class="media2" href="#"><i class="fa fa-facebook"true"></i></a></li>
        <li class="media"><a class="media2" href="https://www.instagram.com/sirnamiskin/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    </ul>
</div>

<div class="footer_copyright">
    <p class="copyright"> &#9400; 2018 Boarding School SIRMIS. All rights reserved.</p>
    <p class="kitsune">Desain By <a href="http://www.kitsuneteamdocumentation.blogspot.com">KITSUNE TEAM</a></p>
</div>
@yield('js')
<!-- Scripts -->
{!! Html::script('js/app.js') !!}
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/responsiveslides.min.js') !!}
{!! Html::script('js/slider.js') !!}
{!! Html::script('js/image_galeri.js') !!}
{!! Html::script('js/loader.js') !!}
</body>
</html>
