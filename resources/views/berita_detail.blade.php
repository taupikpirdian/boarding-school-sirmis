@extends('layouts.app-berita')

@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>{{ $berita->judul }}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area bg-white">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-md-9">
                        <!-- blog start -->
                        <div class="blog-post blog-single">
                            <div class="w3-post-title ">
                                <h3 class="post-title"><a href="#">{{ $berita->judul }}</a></h3>
                            </div>
                            <div class="w3-post-meta m-b20">
                                <ul>
                                    <li class="post-date"> <i class="fa fa-calendar"></i><strong>{{ date('d M', strtotime($berita->created_at)) }}</strong> <span> {{ date('Y, h:i a', strtotime($berita->created_at)) }}</span> </li>
                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="#">Admin</a> </li>
                                    <!-- <li class="post-comment"><i class="fa fa-comments"></i> <a href="#">0 Comments</a> </li> -->
                                </ul>
                            </div>
                            <div class="w3-post-media w3-img-effect zoom-slow"> <a href="#"><img style="width:50%" src="{{URL::asset('images/berita/'.$berita->img)}}" alt=""></a> </div>
                            <div class="w3-post-text" style="text-align: justify;">
                                <p>{!! $berita->isi !!}</p>
                        </div>
                        <!-- blog END -->
                    </div>
                    <!-- Left part END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection
