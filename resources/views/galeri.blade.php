@extends('layouts.app')

@section('content')
	<!-- header END -->
    <!-- Content -->
    <div class="page-content">
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Galeri</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <!-- Left & right section start -->
            <div class="container">
                <!-- Gallery -->
                <div class="site-filters clearfix center  m-b40">
                    <ul class="filters" data-toggle="buttons">
                        <li data-filter="" class="btn active">
                            <input type="radio">
                            <a href="#" class="site-button-secondry active"><span>Show All</span></a> 
						</li>
                        <li data-filter="1" class="btn">
                            <input type="radio" >
                            <a href="#" class="site-button-secondry "><span>Pesantren</span></a> 
						</li>
                        <li data-filter="2" class="btn">
                            <input type="radio">
                            <a href="#" class="site-button-secondry "><span>Tsanawiyah</span></a> 
						</li>
                        <li data-filter="3" class="btn">
                            <input type="radio">
                            <a href="#" class="site-button-secondry "><span>Aliyah</span></a> 
						</li>
                    </ul>
                </div>
                <div class="row">
                    <ul id="masonry" class="w3-gallery-listing gallery-grid-4 mfp-gallery">
					@foreach($galeries as $i=>$galery)
                        <li data-filter="{{ $galery->id_kategori }}" class="card-container col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="w3-box w3-gallery-box">
                                <div class="w3-thum w3-img-overlay1 w3-img-effect zoom-slow"> <a href="javascript:void(0);"> <img src="{{URL::asset('images/galeri/pesantren/thumbs/'.$galery->img)}}"  alt=""> </a>
                                    <div class="overlay-bx">
                                        <div class="overlay-icon"><a  href="{{URL::asset('images/galeri/pesantren/'.$galery->img)}}" class="mfp-link" title="{{ $galery->title }}"> <i class="fa fa-picture-o icon-bx-xs"></i> </a> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <!-- Gallery END -->
                <!-- Pagination start -->
                <div class="pagination-bx  clearfix ">
                   {!! $galeries->render() !!}
                </div>
                <!-- Pagination END -->
            </div>
            <!-- Left & right section  END -->
        </div>
    </div>
    <!-- Content END-->
@endsection
