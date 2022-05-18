@extends('layouts.app')
@section('content')

<img class="img" src="/assets/images/hack.jpg">
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="col-md-6 item-content">
				<div>	
					<h4>Biodata Guru</h4>
					<hr>
				</div>
			</div>
			<div class="col-md-3">
				<button class="btn-kembali"><a href="#">Kembali ke Daftar<i class="left-tabs tab-content"></i></a></button>	
			</div>
			<div class="col-md-3">
			</div>
		</div>	

			<div class="col-md-8 item-content">
				<div class="konten">
					<div class="col-md-4">
					<img class="foto" src="/assets/images/logo2.png">
					</div>
					<div class="data col-md-8">
						<p>Nama					: </p>
						<p>Program Studi		: </p>
						<p>NIP					: </p>
						<p>Pendidikan Tinggi	: </p>
						<p>Jenis Kelamin		: </p>
						<p>Status Aktivitas		: </p>
					</div>
				</div>
		 	</div>


			<div id="myDIV" class="col-md-4">
				<h5 class="font01">Login Website</h5>
				<h8 class="font01">Silahkan masukkan ID/Username dan Password Anda untuk masuk ke dalam website</h8>
			<form class="form-horizontal" action="/action_page.php">
  				<div class="form-group">
    				<div class="col-sm-10">
      				<input type="email" class="form-control" id="email" placeholder="Enter email">
   					</div>
  				</div>
  				<div class="form-group">
    				<div class="col-sm-10"> 
      				<input style="position: relative; bottom: 20px" type="password" class="form-control" id="pwd" placeholder="Enter password">
    				</div>
  				</div>
  				<div class="form-group"> 
    				<div class="col-sm-offset-2 col-sm-10">
      					<div class="checkbox">
        				<label style="position: relative; right: 35px; bottom: 45px"><input type="checkbox"> Remember me</label>
      					</div>
    				</div>
  				</div>
  				<div class="form-group"> 
    				<div class="col-sm-offset-2 col-sm-10">
     					<button style="position: relative; right: 35px; bottom: 45px" type="submit" class="btn btn-default">Submit</button>
      				</div>
    			</div>
    			</form>
  			</div>

  			<div class="col-md-12">
  				<table id="customers">
            <tr>
              <th>No</th>
              <th>Sekolah dan Perguruan Tinggi</th>
              <th>Gelar Akademik</th>
              <th>Tanggal Ijazah</th>
              <th>Jenjang</th>
            </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
              <tr>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
              </tr>
          </table>
  			</div>
	</div>
</div>

@endsection