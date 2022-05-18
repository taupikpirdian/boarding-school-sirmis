@extends('layouts.app')
@section('content')
<!-- Content -->
<div class="page-content">
   <!-- Slider -->
   <div class="main-slider style-two default-banner">
      <div class="tp-banner-container">
         <div class="tp-banner" >
            <div id="dz_rev_slider_2_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="duotone192" data-source="gallery" style="background-color:#000000;padding:0px;">
               <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
               <div id="dz_rev_slider_2" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
                  <ul>
                     <!-- SLIDE  -->
                     @foreach($slider_sirmis as $i=>$slider)
                     <li data-index="rs-297{{ $slider->id }}" data-transition="slide" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{URL::asset('images/slide/'.$slider->img)}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{URL::asset('images/slide/'.$slider->img)}}"   alt=""  data-lazyload="{{URL::asset('images/slide/'.$slider->img)}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper " 
                           id="slide-100-layer-1" 
                           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                           data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                           data-width="full"
                           data-height="full"
                           data-whitespace="nowrap"
                           data-type="shape" 
                           data-basealign="slide" 
                           data-responsive_offset="off" 
                           data-responsive="off"
                           data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                           data-textAlign="['left','left','left','left']"
                           data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]"
                           data-paddingbottom="[0,0,0,0]"
                           data-paddingleft="[0,0,0,0]"
                           style="z-index: 2;background-color:rgba(0, 0, 0, 0.0);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                        </div>
                        <div class="tp-caption Concept-Title text-uppercase tp-resizeme rs-parallaxlevel-2" 
                           id="slide-2972-layer-2" 
                           data-x="['center','center','center','center']" 
                           data-hoffset="['0','0','0','0']" 
                           data-y="['middle','middle','middle','middle']" 
                           data-voffset="['250','250','250','250']" 
                           data-fontsize="['80','50','50','40']"
                           data-lineheight="['90','70','50','40']"
                           data-width="['none','none','none','400']"
                           data-height="none"
                           data-whitespace="['nowrap','nowrap','nowrap','normal']"
                           data-type="text" 
                           data-responsive_offset="on" 
                           data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":1700,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:left(R);","ease":"Power3.easeIn"}]'
                           data-textAlign="['center','center','center','center']"
                           data-paddingtop="[20,20,20,10]"
                           data-paddingright="[50,50,20,10]"
                           data-paddingbottom="[20,20,20,10]"
                           data-paddingleft="[50,50,20,10]"
                           style="z-index: 7; white-space: nowrap;text-transform:left; text-shadow:-2px 2px 0px rgba(0,0,0,0.5); background-color:rgba(255, 255, 255, 0.9); padding:20px; font-weight:700;">
                           <span style="color:#ff63dc">{{$slider->title}} </span><br>
                           <span style="color:#00ddef; font-size: 40px">{{$slider->desc}}</span>
                           <!-- <span style="color:#ffac0c">KOBONG</span> -->
                        </div>
                        <!-- LAYER NR. 4 -->
                     </li>
                     @endforeach
                  </ul>
                  <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
               </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
         </div>
      </div>
   </div>
   <!-- Slider END -->
   <!-- About Company -->
   <div class="section-full bg-white content-inner-2">
      <div class="container">
         <div class="section-content">
            <div class="row">
               @foreach($visi_misis as $i=>$visi)
               <div class="col-md-4 col-sm-4">
                  <div class="icon-bx-wraper bx-style-2 m-t40 m-b60 p-a30 center">
                     <div class="icon-bx-sm bg-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-bar-chart"></i></a> </div>
                     <div class="icon-content p-t40">
                        <h3 class="w3-tilte text-uppercase">visi</h3>
                        <p>{!! str_limit($visi->visi, 95) !!} [...]</p>
                        <br>
                        <a class="site-button " href="{{ url('/visi-misi-tujuan-pesantren-sirnamiskin-bandung') }}">
                        <span class="site-button-inr">Read More <i class="fa fa-arrow-circle-o-right"></i></span>
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach
               @foreach($visi_misis as $i=>$misi)
               <div class="col-md-4 col-sm-4">
                  <div class="icon-bx-wraper bx-style-2 m-t40 m-b60 p-a30 center">
                     <div class="icon-bx-sm bg-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-bank"></i></a> </div>
                     <div class="icon-content p-t40">
                        <h3 class="w3-tilte text-uppercase">misi</h3>
                        <p>{!! str_limit($misi->misi, 95) !!} [...]</p>
                        <br>
                        <a class="site-button " href="{{ url('/visi-misi-tujuan-pesantren-sirnamiskin-bandung') }}">
                        <span class="site-button-inr">Read More <i class="fa fa-arrow-circle-o-right"></i></span>
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach
               @foreach($tujuans as $i=>$tujuan)
               <div class="col-md-4 col-sm-4">
                  <div class="icon-bx-wraper bx-style-2 m-t40 m-b60 p-a30 center">
                     <div class="icon-bx-sm bg-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-user"></i></a> </div>
                     <div class="icon-content p-t40">
                        <h3 class="w3-tilte text-uppercase">tujuan</h3>
                        <p>{!! str_limit($tujuan->isi, 95) !!} [...]</p>
                        <a class="site-button " href="{{ url('/visimisitarget') }}">
                        <span class="site-button-inr">Read More <i class="fa fa-arrow-circle-o-right"></i></span>
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach						
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12 about-bg">
               @foreach($tentang_pesantrens as $i=>$tentang_pesantren)
               <div class="">
                  <img src="{{URL::asset('images/tentang_pesantren/'.$tentang_pesantren->img)}}"/>
               </div>
               <div class="about-content text-center">
                  <h2 class="m-a0 m-b10 text-uppercase h2">Tentang <span class="text-primary">Pesantren</span></h2>
                  <div class="w3-separator bg-primary"></div>
                  <p>{{ $tentang_pesantren->desc }}</p>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!-- About Company END -->
   <!-- Purchase Add -->
   <div class="section-full bg-img-fix content-inner-1 about-uni overlay-primary-dark" style="background-image:url(images/background/bg2.jpg);">
      <div class="container" >
         <div class="row text-white">
            <div class="col-md-6 col-sm-8">
               <h2 class="m-a0 text-uppercase">Pendaftaran Online</h2>
               <p class="m-b0">Calon Santri Pesantren Sirnamiskin</p>
            </div>
            <div class="col-md-6 col-sm-4">
               @if(Auth::check())
               <a href="{{ url('/dashboard-santri/'.Auth::user()->id) }}" class="site-button white pull-right m-t15">MASUK HALAMAN DASHBOARD SANTRI</a>
               @else						
               <a href="{{ url('/register') }}" class="site-button white pull-right m-t15">DAFTAR SANTRI BARU</a>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!-- Purchase Add END -->
   <div class="content-area">
      <!-- content start -->
      <div class="container">
         <!-- icon box style 2 aligh left -->
         <div class="p-a30 bg-white m-b30">
            <div class="section-head inner-haed">
               <h2 class="text-uppercase">Pendaftaran</h2>
            </div>
            <div class="section-content">
               <div class="row">
                  <div class="col-md-4 col-sm-6">
                     <div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
                        <div class="icon-bx-sm bg-primary m-b20"><i class="fa fa-user-plus"></i></div>
                        <div class="icon-content p-l40">
                           <h5 class="w3-tilte text-uppercase">Register dan Login</h5>
                           <p>1. Buat akun baru untuk bisa login,<br>
                              2. Klik tombol Masuk Dashboard untuk melengkapi data pendaftaran
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                     <div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
                        <div class="icon-bx-sm radius bg-primary"><i class="fa fa-child"></i></div>
                        <div class="icon-content p-l40">
                           <h5 class="w3-tilte text-uppercase">Data Pribadi</h5>
                           <p>Lengkapi data calon santri, ayah dan ibu untuk bisa menyelesaikan pendaftaran dan mencetak kartu ujian</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                     <div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
                        <div class="icon-bx-sm bg-primary m-b20"><i class="fa fa-file-pdf-o"></i></div>
                        <div class="icon-content p-l40">
                           <h5 class="w3-tilte text-uppercase">Cetak Kartu Ujian</h5>
                           <p>Cetak kartu ujian pada halaman dashboard santri untuk dapat mengikuti ujian</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- icon box style 2 aligh left END -->
      </div>
      <!-- content END -->
   </div>
   <!-- Our Activities  -->
   <div class="section-full bg-img-fix content-inner overlay-black-dark our-projects-galery" style="background-image:url(frontend/images/background/bg1.jpg);">
      <div class="container">
         <div class="section-head  text-center text-white">
            <h2  class="h2">Kegiatan Santri</h2>
            <div class="w3-separator-outer">
               <div class="w3-separator bg-primary style-liner"></div>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
         </div>
         <div class="site-filters text-center  clearfix">
            <ul class="filters" role="tablist">
               <li role="presentation" class="active">
                  <a href="#1" class=" site-button yellow radius-xl" aria-controls="home" role="tab" data-toggle="tab">
                  OSPS
                  </a>
               </li>
               <li role="presentation">
                  <a href="#2" aria-controls="profile" class=" site-button green radius-xl" role="tab" data-toggle="tab">
                  Muhadoroh
                  </a>
               </li>
               <li role="presentation">
                  <a href="#3" class=" site-button pink radius-xl" aria-controls="messages" role="tab" data-toggle="tab">
                  Marhabaan
                  </a>
               </li>
               <li role="presentation">
                  <a href="#4" class=" site-button orange radius-xl" aria-controls="settings" role="tab" data-toggle="tab">
                  Ziarah
                  </a>
               </li>
               <li role="presentation">
                  <a href="#5" class=" site-button purple radius-xl" aria-controls="settings" role="tab" data-toggle="tab">
                  Ngaji
                  </a>
               </li>
            </ul>
         </div>
         <!-- Tab panes -->
         <div class="tab-content">
            @foreach($kegiatans as $i=>$kegiatan)
            <div role="tabpanel" class="tab-pane {{ ($kegiatan->kategori_id == 1) ? 'active' : '' }} fade {{ $kegiatan->class_css }}" id="{{ $kegiatan->kategori_id }}">
               <div class="row">
                  <div class="col-md-6 col-sm-6 ">
                     <div class="text-left text-white">
                        <h2 class="m-b10">{{ $kegiatan->title }}</h2>
                        <div class="w3-separator-outer">
                           <div class="w3-separator bg-primary style-liner"></div>
                        </div>
                        <p>{!! $kegiatan->desc !!}</p>
                     </div>
                     <!-- <ol class="list-num-count text-white">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Morbi sollicitudin diam condimentum, eleifend erat vel, accumsan neque.</li>
                        <li>Cras vitae lacus volutpat arcu posuere porttitor et quis leo.</li>
                        <li>Sed facilisis mi in dignissim maximus.</li>
                        
                        </ol>
                        <div class="m-t10">
                        <a href="#" class="site-button">Read more</a>
                        </div> -->
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <div class="w3-post-media w3-img-effect zoom-slow m-t20"> <a href="javascript:;"><img src="{{URL::asset('images/kegiatan/'.$kegiatan->img)}}" alt=""></a> </div>
                  </div>
               </div>
            </div>
            @endforeach
            <!-- <div role="tabpanel" class="tab-pane fade " id="spanish">
               <div class="row">
               	<div class="col-md-6 col-sm-6">
               		<div class="text-left text-white">
               			<h2 class="m-b10">Social Activities</h2>
               			<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
               			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
               		</div>
               		<ol class="list-num-count text-white">
                                             <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                             <li>Morbi sollicitudin diam condimentum, eleifend erat vel, accumsan neque.</li>
                                             <li>Cras vitae lacus volutpat arcu posuere porttitor et quis leo.</li>
                                             <li>Sed facilisis mi in dignissim maximus.</li>
                                             
                                         </ol>
               		<div class="m-t10">
               			<a href="#" class="site-button ">Read more</a>
               		</div>
               	</div>
               	<div class="col-md-6 col-sm-6">
               		<div class="w3-post-media w3-img-effect zoom-slow m-t20"> <a href="javascript:;"><img src="frontend/images/blog/default/thum2.jpg" alt=""></a> </div>
               	</div>
               </div>
               </div>
               <div role="tabpanel" class="tab-pane fade " id="lunch">
               <div class="row">
               	<div class="col-md-6 col-sm-6">
               		<div class="text-left text-white">
               			<h2 class="m-b10">learning</h2>
               			<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
               			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
               		</div>
               		<ol class="list-num-count text-white">
                                             <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                             <li>Morbi sollicitudin diam condimentum, eleifend erat vel, accumsan neque.</li>
                                             <li>Cras vitae lacus volutpat arcu posuere porttitor et quis leo.</li>
                                             <li>Sed facilisis mi in dignissim maximus.</li>
                                             
                                         </ol>
               		<div class="m-t10">
               			<a href="#" class="site-button ">Read more</a>
               		</div>
               	</div>
               	<div class="col-md-6 col-sm-6">
               		<div class="w3-post-media w3-img-effect zoom-slow m-t20"> <a href="javascript:;"><img src="frontend/images/blog/default/thum3.jpg" alt=""></a> </div>
               	</div>
               </div>
               </div>
               <div role="tabpanel" class="tab-pane fade " id="swimming">
               <div class="row">
               	<div class="col-md-6 col-sm-6">
               		<div class="text-left text-white">
               			<h2 class="m-b10">Class Room</h2>
               			<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
               			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
               		</div>
               		<ol class="list-num-count text-white">
                                             <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                             <li>Morbi sollicitudin diam condimentum, eleifend erat vel, accumsan neque.</li>
                                             <li>Cras vitae lacus volutpat arcu posuere porttitor et quis leo.</li>
                                             <li>Sed facilisis mi in dignissim maximus.</li>
                                             
                                         </ol>
               		<div class="m-t10">
               			<a href="#" class="site-button ">Read more</a>
               		</div>
               	</div>
               	<div class="col-md-6 col-sm-6 ">
               		<div class="w3-post-media w3-img-effect zoom-slow m-t20"> <a href="javascript:;"><img src="frontend/images/blog/default/thum4.jpg" alt=""></a> </div>
               	</div>
               </div>
               </div>
               <div role="tabpanel" class="tab-pane fade " id="playground">
               <div class="row">
               	<div class="col-md-6 col-sm-6">
               		<div class="text-left text-white">
               			<h2 class="m-b10">Sports</h2>
               			<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
               			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
               		</div>
               		<ol class="list-num-count text-white">
                                             <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                             <li>Morbi sollicitudin diam condimentum, eleifend erat vel, accumsan neque.</li>
                                             <li>Cras vitae lacus volutpat arcu posuere porttitor et quis leo.</li>
                                             <li>Sed facilisis mi in dignissim maximus.</li>
                                             
                                         </ol>
               		<div class="m-t10">
               			<a href="#" class="site-button ">Read more</a>
               		</div>
               	</div>
               	<div class="col-md-6 col-sm-6">
               		<div class="w3-post-media w3-img-effect zoom-slow m-t20"> <a href="javascript:;"><img src="frontend/images/blog/default/thum1.jpg" alt=""></a> </div>
               	</div>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Our Activities END -->
   <!-- Meet Our Team -->
   <div class="section-full bg-white content-inner">
      <div class="container">
         <div class="section-head text-center ">
            <h2 class="h2"> Berita <span class="text-primary">Pesantren</span></h2>
            <div class="w3-separator-outer">
               <div class="w3-separator bg-primary style-liner"></div>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
         </div>
         <div class="section-content text-center ">
            <div class="row">
               @foreach($beritas as $i=>$berita)
               <div class="col-md-3 col-sm-6">
                  <div class="w3-box m-b30 border-1 hover w3-img-effect off-color ">
                     <div class="w3-media"> 
                        <a href='{{URL::action("BeritaFrontController@index",array($berita->slug))}}'> <img alt="" src="{{URL::asset('images/berita/thumbs/'.$berita->img)}}" width="358" height="460"> </a>
                     </div>
                     <div class="p-a10">
                        <h4 class="w3-title m-b10 font-weight-600"><a href='{{URL::action("BeritaFrontController@index",array($berita->slug))}}'>{{$berita->judul}}</a></h4>
                        <span class="w3-member-position">{{$berita->kategori_berita}}</span>
                        <div class="team-social-btn m-tb15">
                           <ul class="w3-social-icon">
                              <li><a style="width: 100%; padding-left: 8px; padding-right: 8px">{{ date('d M y, h:i a', strtotime($berita->created_at)) }}</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!-- Meet Our Team END -->
   <!-- Our Gallery -->
   <div class="section-full bg-img-fix content-inner-2 text-white overlay-black-light" style="background-image:url(frontend/images/background/bg4.jpg);">
      <div class="container">
         <div class="section-head text-center">
            <h2 class="h2"><span class="text-white">Galeri Pesantren</span></h2>
            <div class="w3-separator-outer">
               <div class="w3-separator bg-primary style-liner"></div>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
         </div>
      </div>
      <div class="section-content relative z-index2">
         <div class="site-filters clearfix center  m-b40">
            <ul class="filters" data-toggle="buttons">
               <li data-filter="" class="btn active">
                  <input type="radio">
                  <a href="#" class="site-button pink  active radius-xl"><span>Show All</span></a> 
               </li>
               <li data-filter="1" class="btn">
                  <input type="radio" >
                  <a href="#" class="site-button purple radius-xl"><span>Pesantren</span></a> 
               </li>
               <li data-filter="2" class="btn">
                  <input type="radio">
                  <a href="#" class="site-button orange  radius-xl"><span>Aliyah</span></a> 
               </li>
               <li data-filter="3" class="btn">
                  <input type="radio">
                  <a href="#" class="site-button red  radius-xl"><span>Tsanawiyah</span></a> 
               </li>
            </ul>
         </div>
         <div class="clearfix">
            <ul id="masonry" class="w3-gallery-listing gallery-grid-4 gallery mfp-gallery m-b0">
               @foreach($galeri_pesantren as $i=>$galeri_pesantrens)
               <li data-filter="{{$galeri_pesantrens->id_kategori}}" class="card-container col-lg-3 col-md-3 col-sm-4 col-xs-6 p-a0">
                  <div class="w3-box m-b0">
                     <div class="w3-media w3-img-overlay1 w3-img-effect zoom-slow">
                        <a href="#"> <img src="{{URL::asset('images/galeri/pesantren/thumbs/'.$galeri_pesantrens->img)}}"  alt=""> </a>
                        <div class="overlay-bx">
                           <div class="overlay-icon"><a  href="{{URL::asset('images/galeri/pesantren/'.$galeri_pesantrens->img)}}" class="mfp-link" title="{{$galeri_pesantrens->title}}"> <i class="fa fa-picture-o icon-bx-xs"></i> </a> </div>
                        </div>
                     </div>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
   <!-- Our Gallery END -->
   <!-- Testimonials -->
   <!-- <div class="section-full content-inner bg-white">
      <div class="container">
          <div class="section-head  text-center">
              <h2 class="h2">Apa Kata Alumni</h2>
              <div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
          </div>
      <div class="section-content">
      <div>
      <div class="tab-content client-think">
      <div role="tabpanel" class="tab-pane active p-a40 fade in" id="testmonial1">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
      <h5>Jackson Hernanw3</h5>
      <span>Teacher</span>
      </div>
      <div role="tabpanel" class="tab-pane p-a40 fade" id="testmonial2">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
      <h5>Jackson Hernanw3</h5>
      <span>Teacher</span>
      </div>
      <div role="tabpanel" class="tab-pane p-a40 fade" id="testmonial3">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
      <h5>Jackson Hernanw3</h5>
      <span>Teacher</span>
      </div>
      </div> -->
   <!-- Nav tabs -->
   <!-- <ul class="client-pic text-center m-t40" role="tablist">
      <li role="presentation" class="active">
      	<a href="#testmonial1" aria-controls="testmonial1" role="tab" data-toggle="tab">
      		<img src="frontend/images/testimonials/pic1.jpg"/>
      	</a>
      </li>
      <li role="presentation">
      	<a href="#testmonial2" aria-controls="testmonial2" role="tab" data-toggle="tab">
      		<img src="frontend/images/testimonials/pic2.jpg"/>
      	</a>
      </li>
      <li role="presentation">
      	<a href="#testmonial3" aria-controls="testmonial3" role="tab" data-toggle="tab">
      		<img src="frontend/images/testimonials/pic3.jpg"/>
      	</a>
      </li>
      </ul> -->
   <!-- Tab panes -->
   <!-- </div>
      </div>
      </div>
      </div>		 -->
   <!-- Testimonials End -->
</div>
<!-- Content END-->
@endsection