<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KARTU UJIAN</title>
	{!! Html::style('invoice/css/style.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}

	<!-- {!! Html::style('styles/shards-dashboards.1.1.0.min.css') !!} -->
    <!-- {!! Html::style('styles/extras.1.1.0.min.css') !!} -->
  </head>
  <body class="klm">
    <header class="clearfix">
      <!-- <div id="logo">
        <img src="{{URL::asset('invoice/image/logo.png')}}">
      </div> -->
	<div class="header-kop">
		<div class="header-left">
			<img style="width:100%" src="{{URL::asset('invoice/image/logo.png')}}">
		</div>
		<div class="header-right">
			<h5 style="color:#000; font-size: 16px;"><b>KARTU UJIAN</b></h1>
			<h5 style="color:#000; font-size: 16px;"><b>BOARDING SCHOOL PESANTREN SIRNAMISKIN</b></h1>
			<h5 style="font-size: 12px;">Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235</h5>
			<h5 style="font-size: 12px;">Bandung - Indonesia</h5>
		</div>
	</div>
    <hr>
    <table style="width:100%">
        <tr>
            <th style="width:150px">NIDN</th>
            <td style="width:10px">:</td>
            <td style="width:480px">{{ $pendaftar->nisn }}</td>
            <td rowspan="5"><img src="{{URL::asset('images/pendaftaran/tsanawiyah/'.$pendaftar->photo)}}" width="100%"></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>:</td>
            <td>{{ $pendaftar->nm_lengkap }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>{{ $pendaftar->jk }}</td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td>:</td>
            <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Jenjang Pendaftaran</th>
            <td>:</td>
            <td>{{ $pendaftar->jenjang }}</td>
        </tr>
        <tr>
            <th>Pesantren?</th>
            <td>:</td>
            <td>{{ $pendaftar->pesantren }}</td>
        </tr>
        <tr>
            <th colspan="5"></th>
        </tr>
        <tr>
            <th colspan="5">Selamat, anda berhasil melalukan tahap awal registrasi santri baru. Silahkan bawa kartu ini sebagai syarat mengikuti ujian seleksi masuk</th>
        </tr>
    </table>
    </header>
    <footer>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
    
	<script>
		window.print()
	</script>
  </body>
</html>

<br>
<hr>
<br>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KARTU UJIAN</title>
	{!! Html::style('invoice/css/style.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}

	<!-- {!! Html::style('styles/shards-dashboards.1.1.0.min.css') !!} -->
    <!-- {!! Html::style('styles/extras.1.1.0.min.css') !!} -->
  </head>
  <body class="klm">
    <header class="clearfix">
      <!-- <div id="logo">
        <img src="{{URL::asset('invoice/image/logo.png')}}">
      </div> -->
	<div class="header-kop">
		<div class="header-left">
			<img style="width:100%" src="{{URL::asset('invoice/image/logo.png')}}">
		</div>
		<div class="header-right">
			<h5 style="color:#000; font-size: 16px;"><b>KARTU UJIAN</b></h1>
			<h5 style="color:#000; font-size: 16px;"><b>BOARDING SCHOOL PESANTREN SIRNAMISKIN</b></h1>
			<h5 style="font-size: 12px;">Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235</h5>
			<h5 style="font-size: 12px;">Bandung - Indonesia</h5>
		</div>
	</div>
    <hr>
    <table style="width:100%">
        <tr>
            <th style="width:150px">NIDN</th>
            <td style="width:10px">:</td>
            <td style="width:480px">{{ $pendaftar->nisn }}</td>
            <td rowspan="5"><img src="{{URL::asset('images/pendaftaran/tsanawiyah/'.$pendaftar->photo)}}" width="100%"></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>:</td>
            <td>{{ $pendaftar->nm_lengkap }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>{{ $pendaftar->jk }}</td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td>:</td>
            <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Jenjang Pendaftaran</th>
            <td>:</td>
            <td>{{ $pendaftar->jenjang }}</td>
        </tr>
        <tr>
            <th>Pesantren?</th>
            <td>:</td>
            <td>{{ $pendaftar->pesantren }}</td>
        </tr>
        <tr>
            <th colspan="5"></th>
        </tr>
        <tr>
            <th colspan="5">Selamat, anda berhasil melalukan tahap awal registrasi santri baru. Silahkan bawa kartu ini sebagai syarat mengikuti ujian seleksi masuk</th>
        </tr>
    </table>
    </header>
    <footer>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
    
	<script>
		window.print()
	</script>
  </body>
</html>

<br>
<hr>
<br>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KARTU UJIAN</title>
	{!! Html::style('invoice/css/style.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}

	<!-- {!! Html::style('styles/shards-dashboards.1.1.0.min.css') !!} -->
    <!-- {!! Html::style('styles/extras.1.1.0.min.css') !!} -->
  </head>
  <body class="klm">
    <header class="clearfix">
      <!-- <div id="logo">
        <img src="{{URL::asset('invoice/image/logo.png')}}">
      </div> -->
	<div class="header-kop">
		<div class="header-left">
			<img style="width:100%" src="{{URL::asset('invoice/image/logo.png')}}">
		</div>
		<div class="header-right">
			<h5 style="color:#000; font-size: 16px;"><b>KARTU UJIAN</b></h1>
			<h5 style="color:#000; font-size: 16px;"><b>BOARDING SCHOOL PESANTREN SIRNAMISKIN</b></h1>
			<h5 style="font-size: 12px;">Jl. KH. Wahid Hasyim No.429-433, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235</h5>
			<h5 style="font-size: 12px;">Bandung - Indonesia</h5>
		</div>
	</div>
    <hr>
    <table style="width:100%">
        <tr>
            <th style="width:150px">NIDN</th>
            <td style="width:10px">:</td>
            <td style="width:480px">{{ $pendaftar->nisn }}</td>
            <td rowspan="5"><img src="{{URL::asset('images/pendaftaran/tsanawiyah/'.$pendaftar->photo)}}" width="100%"></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>:</td>
            <td>{{ $pendaftar->nm_lengkap }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>{{ $pendaftar->jk }}</td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td>:</td>
            <td>{{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Jenjang Pendaftaran</th>
            <td>:</td>
            <td>{{ $pendaftar->jenjang }}</td>
        </tr>
        <tr>
            <th>Pesantren?</th>
            <td>:</td>
            <td>{{ $pendaftar->pesantren }}</td>
        </tr>
        <tr>
            <th colspan="5"></th>
        </tr>
        <tr>
            <th colspan="5">Selamat, anda berhasil melalukan tahap awal registrasi santri baru. Silahkan bawa kartu ini sebagai syarat mengikuti ujian seleksi masuk</th>
        </tr>
    </table>
    </header>
    <footer>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
    
	<script>
		window.print()
	</script>
  </body>
</html>