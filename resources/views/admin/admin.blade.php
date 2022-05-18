
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-9 main-chart">
    <!--CUSTOM CHART START -->
<!--     <div class="border-head">
        <h3>Pendaftar</h3>
    </div>
    <div class="custom-bar-chart">
        <ul class="y-axis">
        <li><span>10.000</span></li>
        <li><span>8.000</span></li>
        <li><span>6.000</span></li>
        <li><span>4.000</span></li>
        <li><span>2.000</span></li>
        <li><span>0</span></li>
        </ul>
        <div class="bar">
        <div class="title">JAN</div>
        <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
        </div>
        <div class="bar ">
        <div class="title">FEB</div>
        <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
        </div>
        <div class="bar ">
        <div class="title">MAR</div>
        <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
        </div>
        <div class="bar ">
        <div class="title">APR</div>
        <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
        </div>
        <div class="bar">
        <div class="title">MAY</div>
        <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
        </div>
        <div class="bar ">
        <div class="title">JUN</div>
        <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
        </div>
        <div class="bar">
        <div class="title">JUL</div>
        <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
        </div>
    </div> -->
    <!--custom chart end-->
</div>
    <!-- /col-lg-9 END SECTION MIDDLE -->
    <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->
<div class="col-lg-3 ds">
    <!--NEW EARNING STATS -->
    <!-- <div class="panel terques-chart">
        <div class="panel-body">
        <div class="chart">
            <div class="centered">
            <span>Pengunjung Website</span>
            </div>
            <br>
            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
        </div>
        </div>
    </div> -->
    <!--new earning end-->
    <!-- RECENT ACTIVITIES SECTION -->
    <h4 class="centered mt">RECENT ACTIVITY</h4>
    <!-- First Activity -->
    @foreach($logs as $i=>$log)
    <div class="desc">
        <div class="thumb">
        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
        </div>
        <div class="details">
        <p>
            <muted>{{ date('d M Y, h:i a', strtotime($log->created_at)) }}</muted>
            <br/>
            <a href="#">{{$log->name}}</a> {{$log->aktifitas}}<br/>
        </p>
        </div>
    </div>
    @endforeach
    <!-- CALENDAR-->
    <div id="calendar" class="mb">
        <div class="panel green-panel no-margin">
        <div class="panel-body">
            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
            <div class="arrow"></div>
            <h3 class="popover-title" style="disadding: none;"></h3>
            <div id="date-popover-content" class="popover-content"></div>
            </div>
            <div id="my-calendar"></div>
        </div>
        </div>
    </div>
    <!-- / calendar -->
    </div>
    <!-- /col-lg-3 -->
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Selamat Datang Di Halaman Dashboard!',
        // (string | mandatory) the text inside the notification
        text: 'Ini adalah halaman admin untuk mengatur konten halaman website.',
        // (string | optional) the image to display on the left
        image: 'admin/img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
@endsection
