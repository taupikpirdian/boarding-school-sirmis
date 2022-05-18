@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Berita</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <!-- Blog half image -->
                @foreach($beritas as $i=>$berita)
                <div class="blog-post blog-md clearfix date-style-2">
                    <div class="w3-post-media w3-img-effect zoom-slow"> <a href="#"><img src="{{URL::asset('images/berita/thumbs/'.$berita->img)}}" alt=""></a> </div>
                    <div class="w3-post-info">
                        <div class="w3-post-title ">
                            <h3 class="post-title"><a href='{{URL::action("BeritaFrontController@index",array($berita->slug))}}'>{{ $berita->judul }}</a></h3>
                        </div>
                        <div class="w3-post-meta ">
                            <ul>
                                <li class="post-date"> <i class="fa fa-calendar"></i><strong>{{ date('d M', strtotime($berita->created_at)) }}</strong> <span> {{ date('Y', strtotime($berita->created_at)) }}</span> </li>
                                <li class="post-author"><i class="fa fa-user"></i>By <a href="#">Admin</a> </li>
                                <!-- <li class="post-comment"><i class="fa fa-comments"></i> <a href="#">0</a> </li> -->
                            </ul>
                        </div>
                        <div class="w3-post-text">
                            <p>{!! str_limit($berita->isi, 700) !!}</p>
                        </div>
                        <div class="w3-post-readmore"> <a href='{{URL::action("BeritaFrontController@index",array($berita->slug))}}' title="READ MORE" rel="bookmark" class="site-button-link">READ MORE<i class="fa fa-angle-double-right"></i></a> </div>
                        <div class="w3-post-tags">
                            <div class="post-tags"> <a href="#">{{ $berita->kategori_berita }} </a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Blog half image END -->
                <!-- Pagination  -->
                <div class="pagination-bx clearfix ">
                    {!! $beritas->render() !!}
                </div>
                <!-- Pagination END -->
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection