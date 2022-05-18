
@extends('layouts.santri')
@section('content')
<div class="row">
    <div class="col-lg-9 main-chart">
    <!--CUSTOM CHART START -->
    <div class="border-head">
        <h3>Dashboard Santri - Alur Pendaftaran Santri Baru</h3>
    </div>
    <div class="custom-bar-chart">
    @foreach($flows as $i=>$flow)
        <h4 style="line-height:26px;">{{ $flow->desc }}</h4>
        <br>
        <img style="width:100%; height: auto;" src="{{URL::asset('images/flow/'.$flow->img)}}">
    @endforeach
    </div>
    <!--custom chart end-->
</div>
    <!-- /col-lg-9 END SECTION MIDDLE -->
    <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->
<div class="col-lg-3 ds">
<!--COMPLETED ACTIONS DONUTS CHART-->
    <div class="donut-main">
        <h4>KELENGKAPAN DATA</h4>
        <canvas id="newchart" height="130" width="130"></canvas>
        <script>
        var doughnutData = [{
            value: 100,
            color: "#4ECDC4"
            },
            {
            value: {{ $act }},
            color: "#fdfdfd"
            }
        ];
        var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
        </script>
    </div>
    <!-- RECENT ACTIVITIES SECTION -->
    <h4 class="centered mt">AKTIFITAS</h4>
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
        title: 'Hi {{ Auth::user()->name }}, Selamat Datang Di Halaman Dashboard Santri!',
        // (string | mandatory) the text inside the notification
        text: 'Silahkan lengkapi data untuk menyelesaikan pendaftaran.',
        // (string | optional) the image to display on the left
        // image: 'images/pendaftaran/tsanawiyah/thumbs/1578665186.jpg',
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
