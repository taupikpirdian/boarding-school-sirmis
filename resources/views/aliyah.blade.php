@extends('layouts.app')

@section('content')
            <!-- slider -->
            <section id="university-courses" class="section-prodi" style="background-color: #FFF">
                <div class="container">
                    <h2 style="text-align: center; width: 100%">
                        <span style="text-align: center;">SELAMAT DATANG DI</span>
                    </h2>
                    <h2 style="text-align: center; width: 100%">
                        <span style="text-align: center;">MADRASAH ALIYAH PESANTREN SIRNAMISKIN</span>
                    </h2>
                    <br>

                    <div class="row">
                    @foreach($detail_lembaga_aliyah as $i=>$detail_lembaga_aliyahs)
                        <div class="col-md-8 col-md-offset-2" data-animation="pulse">
                        <!-- Heading -->
                            <h2 class="titel-nomar text-center">
                                Detail Lembaga
                            </h2>
                            <!-- Text -->
                             <div class="detailembaga entry-content">
                                <p style="text-align: justify;">
                                 {!! $detail_lembaga_aliyahs->deskripsi !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <div class="section-title section-prodi" data-animation="fadeInUp">
                          <!-- Heading -->
                    <h2 style="text-align: center; width: 100%">
                        <span style="text-align: center;">VISI DAN MISI</span>
                    </h2>

                    </div>

                    @foreach($visi_misi_aliyah as $i=>$visi_misi_aliyahs)
                    <div class="col-md-12">
                        <div class="col-sm-6">
                        <!-- Heading -->
                            <h2 class="titel-nomar text-center">
                                Visi
                            </h2>
                              <!-- Content -->
                              <div class="visimisi entry-content">
                                <p style="text-align: justify;">
                                    {!! $visi_misi_aliyahs->visi !!}
                                </p>
                                
                              </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- Heading -->
                            <h2 class="titel-nomar text-center">
                                Misi
                            </h2>
                              <!-- Content -->
                              <div class="visimisi entry-content">
                                <p style="text-align: justify;">
                                    {!! $visi_misi_aliyahs->misi !!}
                                </p>
                               
                              </div>
                        </div>

                    </div>
                    @endforeach

                    <hr>
                </div>
                 <div class="clearfix"></div>
            </section>
            
            <section id="home-professor">
                    <div class="container">
                        <h2 style="text-align: center; width: 100%">
                            <span style="text-align: center;">PROFIL PIMPINAN</span>
                        </h2>
                        <p class="center">Madrasah Aliyah</p>

                        @foreach($pimpinan_aliyah as $i=>$pimpinan_aliyahs)
                        <div class="team-slider carou-slider animation-element fade-in">
                            <div class="slider">

                                <div class="item">
                                    <div class="team box">
                                        <div class="thumb">
                                            <img style="width: 30% " src="{{URL::asset('images/pimpinan/'.$pimpinan_aliyahs->img)}}" alt="">
                                            <div class="thumb-info">
                                                <div class="socials">
                                                    <ul>
                                                        <li><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="info">
                                            <span class="name">
                                                {{ $pimpinan_aliyahs->name }}
                                            </span>

                                            <span class="job">
                                                {{ $pimpinan_aliyahs->jabatan }}
                                            </span>
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
            </section>

            <section id="home-book">
                    <div class="container">
                        <h2 style="text-align: center; width: 100%">
                            <span style="text-align: center;">DATA GURU</span>
                        </h2>
                        <p class="center">Madrasah Aliyah</p>

                        <div class="courses layout column-4 isotope animation-element fade-in">
                            @foreach($aliyah as $i=>$aliyahs)
                             <!-- foreche didieu nya :D -->
                                <div class="item">
                                    <div class="team box">
                                        <div class="thumb">
                                            <img src="{{URL::asset('images/biodataguru/pesantren/thumbs/'.$aliyahs->img)}}" alt="">
                                            <div class="thumb-info">
                                                <div class="socials">
                                                    <ul>
                                                        <li><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="info">
                                            <span class="name">{{ $aliyahs->nama }}</span>
                                             <span class="job">{{ $aliyahs->matpel }}</span>
                                            <!-- <p>Deskripsi Singkat Dosen</p> -->
                                        </div>
                                    </div>
                                </div>
                            <!--  endforeach -->
                            @endforeach
                        </div>
                    </div>
                </section>
        <!-- pengumuman -->
@endsection