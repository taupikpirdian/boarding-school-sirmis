<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Sirmis - Dashboard Santri</title>

  <!-- Favicons -->
  <link href="admin/img/favicon.png" rel="icon">
  <link href="admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {!! Html::style('admin/lib/bootstrap/css/bootstrap.min.css') !!}
  <!--external css-->
  {!! Html::style('admin/lib/font-awesome/css/font-awesome.css') !!}
  {!! Html::style('admin/css/zabuto_calendar.css') !!}
  {!! Html::style('admin/lib/gritter/css/jquery.gritter.css') !!}
  <!-- Custom styles for this template -->
  {!! Html::style('admin/css/style.css') !!}
  {!! Html::style('admin/css/style-responsive.css') !!}
  {!! Html::script('admin/lib/chart-master/Chart.js') !!}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css') !!}
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{URL::to('/')}}" class="logo"><b>SIR<span>MIS</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="logout">Logout</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
        </ul>
      </div>
    </header>

    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          @if($pendaftar)
          <p class="centered"><a href="{{ url('/dashboard-santri/'.Auth::user()->id) }}"><img src="{{URL::asset('images/pendaftaran/tsanawiyah/thumbs/'.$pendaftar->photo)}}" class="img-circle" width="80"></a></p>
          @else
          <p class="centered"><a href="{{ url('/dashboard-santri/'.Auth::user()->id) }}"><img src="{{URL::asset('assets/images/santri.png')}}" class="img-circle" width="80"></a></p>
          @endif
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a class="active" href="{{ url('/dashboard-santri/'.Auth::user()->id) }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="sub-menu">
          @if($pendaftar)
            @if($pendaftar->nm_lengkap)
            <a data-toggle="modal" data-target="#santriModalEdit" href="javascript:;">
              <i class="fa fa-check-circle"></i>
              <span>Data Santri</span>
            </a>
            @else
            <a data-toggle="modal" data-target="#santriModal" href="javascript:;">
              <i class="fa fa-window-close"></i>
              <span>Data Santri</span>
            </a>
            @endif
          @else
          <a data-toggle="modal" data-target="#santriModal" href="javascript:;">
            <i class="fa fa-window-close"></i>
            <span>Data Santri</span>
          </a>
          @endif
          </li>
          
          <li class="sub-menu">
          @if($pendaftar)
            @if($pendaftar->nama_ayah)
            <a data-toggle="modal" data-target="#ayahModalEdit" href="javascript:;">
              <i class="fa fa-check-circle"></i>
              <span>Data Ayah</span>
            </a>
            @else
            <a data-toggle="modal" data-target="#ayahModal" href="javascript:;">
              <i class="fa fa-window-close"></i>
              <span>Data Ayah</span>
            </a>
            @endif
          @else
          <a data-toggle="modal" data-target="#ayahModal" href="javascript:;">
            <i class="fa fa-window-close"></i>
            <span>Data Ayah</span>
          </a>
          @endif
          </li>

          <li class="sub-menu">
          @if($pendaftar)
            @if($pendaftar->nama_ibu)
            <a data-toggle="modal" data-target="#ibuModalEdit" href="javascript:;">
              <i class="fa fa-check-circle"></i>
              <span>Data Ibu</span>
            </a>
            @else
            <a data-toggle="modal" data-target="#ibuModal" href="javascript:;">
              <i class="fa fa-window-close"></i>
              <span>Data Ibu</span>
            </a>
            @endif
          @else
          <a data-toggle="modal" data-target="#ibuModal" href="javascript:;">
            <i class="fa fa-window-close"></i>
            <span>Data Ibu</span>
          </a>
          @endif
          </li>
          @if($pendaftar)
          <li class="sub-menu">
            @if($pendaftar->nm_lengkap && $pendaftar->nama_ibu && $pendaftar->nama_ayah)
            <a target="_blank" href="{{ url('/kartu-ujian/'.Auth::user()->id) }}">
              <i class="fa fa-check-circle"></i>
              <span>Cetak Kartu Ujian</span>
            </a>
            @else
            <a onclick="myFunction()" href="javascript:;">
              <i class="fa fa-window-close"></i>
              <span>Cetak Kartu Ujian</span>
            </a>
            @endif
          </li>
          @endif
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
      <!-- Button trigger modal -->
      <!-- Pop up -->
        <!-- Modal -->
        <div class="modal fade" id="santriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Biodata Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {{ Form::open(array('id' => 'regForm', 'url' => 'pendaftaran-tsanawiyah/create', 'files' => true, 'method' => 'post', 'autocomplete' => 'off')) }}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan NISN" name="nisn" required>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nm_lengkap" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tempat_lahir" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  {{ Form::text("tanggal_lahir", '',['class' => 'form-control required', 'id' => 'datepicker']) }}
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_siswa" required></textarea>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control required" name="jk">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenjang Pendaftaran</label>
                  <select class="form-control" name="jenjang">
                    <option value="">Pilih Jenjang Pendidikan</option>
                    <option value="MTS">MTS</option>
                    <option value="MA">MA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ukuran Seragam</label>
                  <select class="form-control" name="ukuran_seragam">
                    <option value="">Pilih Ukuran Seragam</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp" name="no_tlp" required>
                </div>
                <div class="form-group">
                  <label>Mondok?</label>
                  <select class="form-control" name="pesantren">
                    <option value="">Daftar Mondok?</option>
                    <option value="Iya">Iya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </div>
                <div class="form-group">
                <label>Photo</label>
                  <p>Pas Photo 3x4:<input class="form-control" type="file" onchange="readURL(this);" placeholder="Photo..." oninput="this.className = ''" name="photo" required></p>
                  <img id="choose" src="#" alt="your image" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        <!-- End modal -->
        @if($pendaftar)
        <!-- Modal Edit Santri -->
        <div class="modal fade" id="santriModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Biodata Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {!! Form::model($pendaftar,['files'=>true,'method'=>'put','action'=>['FrontPendaftaranTsanawiyahController@update',$pendaftar->id]]) !!}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan NISN" name="nisn" value="{{ $pendaftar->nisn }}" required>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nm_lengkap" value="{{ $pendaftar->nm_lengkap }}" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tempat_lahir" value="{{ $pendaftar->tempat_lahir }}" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_siswa" required>{{ $pendaftar->alamat_siswa }}</textarea>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control required" name="jk" value="{{ $pendaftar->jk }}">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option @if(old('jk',$pendaftar->jk) == 'Laki-laki') selected @endif >
                           Laki-laki
                    </option>
                    <option @if(old('jk',$pendaftar->jk) == 'Perempuan') selected @endif >
                           Perempuan
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenjang Pendaftaran</label>
                  <select class="form-control" name="jenjang" value="{{ $pendaftar->jenjang }}">
                    <option value="">Pilih Jenjang Pendidikan</option>
                    <option @if(old('jk',$pendaftar->jenjang) == 'MTS') selected @endif >
                          MTS
                    </option>
                    <option @if(old('jk',$pendaftar->jenjang) == 'MA') selected @endif >
                          MA
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ukuran Seragam</label>
                  <select class="form-control" name="ukuran_seragam" value="{{ $pendaftar->ukuran_seragam }}">
                    <option value="">Pilih Ukuran Seragam</option>
                    <option @if(old('jk',$pendaftar->ukuran_seragam) == 'S') selected @endif >
                          S
                    </option>
                    <option @if(old('jk',$pendaftar->ukuran_seragam) == 'M') selected @endif >
                          M
                    </option>
                    <option @if(old('jk',$pendaftar->ukuran_seragam) == 'L') selected @endif >
                          L
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp" name="no_tlp" value="{{ $pendaftar->no_tlp }}" required>
                </div>
                <div class="form-group">
                  <label>Mondok?</label>
                  <select class="form-control" name="pesantren" value="{{ $pendaftar->pesantren }}">
                    <option value="">Daftar Mondok?</option>
                    <option @if(old('jk',$pendaftar->pesantren) == 'Iya') selected @endif >
                        Iya, Sambil Mondok
                    </option>
                    <option @if(old('jk',$pendaftar->pesantren) == 'Tidak') selected @endif >
                        Tidak Sambil Mondok
                    </option>
                  </select>
                </div>
                <div class="form-group">
                <label>Photo</label>
                  <p>Pas Photo 3x4:<input class="form-control" type="file" onchange="readURL(this);" placeholder="Photo..." name="photo"></p>
                  <img style="width:30%" id="choose" src="{{URL::asset('images/pendaftaran/tsanawiyah/thumbs/'.$pendaftar->photo)}}" alt="your image" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        @endif
        <!-- End modal -->
        <!-- Modal -->
        <div class="modal fade" id="ayahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Biodata Ayah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {{ Form::open(array('id' => 'regForm', 'url' => 'pendaftaran-tsanawiyah/create', 'files' => true, 'method' => 'post')) }}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nama_ayah" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tmpt_lahir_ayah" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_ayah" required></textarea>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select class="form-control" name="pekerjaan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option value="PNS">PNS</option>
                    <option value="SWATSA">SWATSA</option>
                    <option value="BUMN">BUMN</option>
                    <option value="BURUH">BURUH</option>
                    <option value="PEDAGANG">PEDAGANG</option>
                    <option value="PETANI">PETANI</option>
                    <option value="TNI">TNI</option>
                    <option value="POLISI">POLISI</option>
                    <option value="GURU">GURU</option>
                    <option value="DOSEN">DOSEN</option>
                    <option value="WIRASWASTA">WIRASWASTA</option>
                    <option value="DOKTER">DOKTER</option>
                    <option value="WIRASWASTA">IRT</option>
                    <option value="DOKTER">DLL</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penghasilan</label>
                  <select class="form-control" name="penghasilan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option value="Kurang Dari Sama Dengan 500.000">Kurang Dari Sama Dengan 500.000</option>
                    <option value="Lebih Dari 500.000">Lebih Dari 500.000</option>
                    <option value="Lebih Dari Sama Dengan 1.500.000">Lebih Dari Sama Dengan 1.500.000</option>
                    <option value="Lebih Dari Sama Dengan 3.000.000">Lebih Dari Sama Dengan 3.000.000</option>
                    <option value="Lebih Dari Sama Dengan 5.000.000">Lebih Dari Sama Dengan 5.000.000</option>
                    <option value="Lebih Dari Sama Dengan 10.000.000">Lebih Dari Sama Dengan 10.000.000</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="form-control" name="pendidikan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="DIPLOMA">DIPLOMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="DLL">DLL</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp, Isi 0 Jika tidak ada" name="no_tlp_ayah" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        <!-- End modal -->
        <!-- Modal Edit Ayah -->
        @if($pendaftar)
        <div class="modal fade" id="ayahModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Biodata Ayah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {!! Form::model($pendaftar,['files'=>true,'method'=>'put','action'=>['FrontPendaftaranTsanawiyahController@update',$pendaftar->id]]) !!}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nama_ayah" value="{{ $pendaftar->nama_ayah }}" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tmpt_lahir_ayah" value="{{ $pendaftar->tmpt_lahir_ayah }}" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_ayah" required>{{ $pendaftar->alamat_ayah }}</textarea>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select class="form-control" name="pekerjaan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'PNS') selected @endif >
                    PNS
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'SWATSA') selected @endif >
                    SWATSA
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'BUMN') selected @endif >
                    BUMN
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'BURUH') selected @endif >
                    BURUH
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'PEDAGANG') selected @endif >
                    PEDAGANG
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'PETANI') selected @endif >
                    PETANI
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'TNI') selected @endif >
                    TNI
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'POLISI') selected @endif >
                    POLISI
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'GURU') selected @endif >
                    GURU
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'DOSEN') selected @endif >
                    DOSEN
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'WIRASWASTA') selected @endif >
                    WIRASWASTA
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'DOKTER') selected @endif >
                    DOKTER
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'IRT') selected @endif >
                    IRT
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ayah) == 'DLL') selected @endif >
                    DLL
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penghasilan</label>
                  <select class="form-control" name="penghasilan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Kurang Dari Sama Dengan 500.000') selected @endif >
                    Kurang Dari Sama Dengan 500.000
                    </option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Lebih Dari 500.000') selected @endif >
                    Lebih Dari 500.000
                    </option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Lebih Dari Sama Dengan 1.500.000') selected @endif >
                    Lebih Dari Sama Dengan 1.500.000
                    </option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Lebih Dari Sama Dengan 3.000.000') selected @endif >
                    Lebih Dari Sama Dengan 3.000.000
                    </option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Lebih Dari Sama Dengan 5.000.000') selected @endif >
                    Lebih Dari Sama Dengan 5.000.000
                    </option>
                    <option @if(old('penghasilan_ayah',$pendaftar->penghasilan_ayah) == 'Lebih Dari Sama Dengan 10.000.000') selected @endif >
                    Lebih Dari Sama Dengan 10.000.000
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="form-control" name="pendidikan_ayah">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'SD') selected @endif >
                    SD
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'SMP') selected @endif >
                    SMP
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'SMA') selected @endif >
                    SMA
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'DIPLOMA') selected @endif >
                    DIPLOMA
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'S1') selected @endif >
                    S1
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'S2') selected @endif >
                    S2
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'S3') selected @endif >
                    S3
                    </option>
                    <option @if(old('pendidikan_ayah',$pendaftar->pendidikan_ayah) == 'DLL') selected @endif >
                    DLL
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp, Isi angka 0 Jika tidak ada" name="no_tlp_ayah" value="{{ $pendaftar->no_tlp_ayah }}" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        @endif
        <!-- End modal -->
        <!-- Modal -->
        <div class="modal fade" id="ibuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Biodata Ibu Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {{ Form::open(array('id' => 'regForm', 'url' => 'pendaftaran-tsanawiyah/create', 'files' => true, 'method' => 'post')) }}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nama_ibu" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tmpt_lahir_ibu" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_ibu" required></textarea>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select class="form-control" name="pekerjaan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option value="PNS">PNS</option>
                    <option value="SWATSA">SWATSA</option>
                    <option value="BUMN">BUMN</option>
                    <option value="BURUH">BURUH</option>
                    <option value="PEDAGANG">PEDAGANG</option>
                    <option value="PETANI">PETANI</option>
                    <option value="TNI">TNI</option>
                    <option value="POLISI">POLISI</option>
                    <option value="GURU">GURU</option>
                    <option value="DOSEN">DOSEN</option>
                    <option value="WIRASWASTA">WIRASWASTA</option>
                    <option value="DOKTER">DOKTER</option>
                    <option value="WIRASWASTA">IRT</option>
                    <option value="DOKTER">DLL</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penghasilan</label>
                  <select class="form-control" name="penghasilan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option value="Kurang Dari Sama Dengan 500.000">Kurang Dari Sama Dengan 500.000</option>
                    <option value="Lebih Dari 500.000">Lebih Dari 500.000</option>
                    <option value="Lebih Dari Sama Dengan 1.500.000">Lebih Dari Sama Dengan 1.500.000</option>
                    <option value="Lebih Dari Sama Dengan 3.000.000">Lebih Dari Sama Dengan 3.000.000</option>
                    <option value="Lebih Dari Sama Dengan 5.000.000">Lebih Dari Sama Dengan 5.000.000</option>
                    <option value="Lebih Dari Sama Dengan 10.000.000">Lebih Dari Sama Dengan 10.000.000</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="form-control" name="pendidikan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="DIPLOMA">DIPLOMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="DLL">DLL</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp, Isi 0 Jika tidak ada" name="no_tlp_ibu" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        <!-- End modal -->
        <!-- Modal Edit Ibu -->
        @if($pendaftar)
        <div class="modal fade" id="ibuModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Biodata Ibu Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {!! Form::model($pendaftar,['files'=>true,'method'=>'put','action'=>['FrontPendaftaranTsanawiyahController@update',$pendaftar->id]]) !!}
                <h3>Formulir Pendaftaran Siswa Baru:</h3>
                <hr>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" name="nama_ibu" value="{{ $pendaftar->nama_ibu }}" required>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Tempat Lahir" name="tmpt_lahir_ibu" value="{{ $pendaftar->tmpt_lahir_ibu }}" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat_ibu" required>{{ $pendaftar->alamat_ibu }}</textarea>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select class="form-control" name="pekerjaan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'PNS') selected @endif >
                    PNS
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'SWATSA') selected @endif >
                    SWATSA
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'BUMN') selected @endif >
                    BUMN
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'BURUH') selected @endif >
                    BURUH
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'PEDAGANG') selected @endif >
                    PEDAGANG
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'PETANI') selected @endif >
                    PETANI
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'TNI') selected @endif >
                    TNI
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'POLISI') selected @endif >
                    POLISI
                    </option>
                    <option @if(old('pekerjaan_ayah',$pendaftar->pekerjaan_ibu) == 'GURU') selected @endif >
                    GURU
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'DOSEN') selected @endif >
                    DOSEN
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ayah) == 'WIRASWASTA') selected @endif >
                    WIRASWASTA
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'DOKTER') selected @endif >
                    DOKTER
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'IRT') selected @endif >
                    IRT
                    </option>
                    <option @if(old('pekerjaan_ibu',$pendaftar->pekerjaan_ibu) == 'DLL') selected @endif >
                    DLL
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penghasilan</label>
                  <select class="form-control" name="penghasilan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Kurang Dari Sama Dengan 500.000') selected @endif >
                    Kurang Dari Sama Dengan 500.000
                    </option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Lebih Dari 500.000') selected @endif >
                    Lebih Dari 500.000
                    </option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Lebih Dari Sama Dengan 1.500.000') selected @endif >
                    Lebih Dari Sama Dengan 1.500.000
                    </option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Lebih Dari Sama Dengan 3.000.000') selected @endif >
                    Lebih Dari Sama Dengan 3.000.000
                    </option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Lebih Dari Sama Dengan 5.000.000') selected @endif >
                    Lebih Dari Sama Dengan 5.000.000
                    </option>
                    <option @if(old('penghasilan_ibu',$pendaftar->penghasilan_ibu) == 'Lebih Dari Sama Dengan 10.000.000') selected @endif >
                    Lebih Dari Sama Dengan 10.000.000
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="form-control" name="pendidikan_ibu">
                    <option>Pilih Salah Satu</option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'SD') selected @endif >
                    SD
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'SMP') selected @endif >
                    SMP
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'SMA') selected @endif >
                    SMA
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'DIPLOMA') selected @endif >
                    DIPLOMA
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'S1') selected @endif >
                    S1
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'S2') selected @endif >
                    S2
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'S3') selected @endif >
                    S3
                    </option>
                    <option @if(old('pendidikan_ibu',$pendaftar->pendidikan_ibu) == 'DLL') selected @endif >
                    DLL
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan No Hp, Isi angka 0 Jika tidak ada" name="no_tlp_ibu" value="{{ $pendaftar->no_tlp_ibu }}" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
              {!! Form::close() !!}   
            </div>
          </div>
        </div>
        @endif
        <!-- End modal -->
      <!-- End Pop up -->
        @yield('content')
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  {!! Html::script('admin/lib/jquery/jquery.min.js') !!}

  {!! Html::script('admin/lib/bootstrap/js/bootstrap.min.js') !!}
  {!! Html::script('admin/lib/jquery.dcjqaccordion.2.7.js') !!}
  {!! Html::script('admin/lib/jquery.scrollTo.min.js') !!}
  {!! Html::script('admin/lib/jquery.nicescroll.js') !!}
  {!! Html::script('admin/lib/jquery.sparkline.js') !!}
  <!--common script for all pages-->
  {!! Html::script('admin/lib/common-scripts.js') !!}
  {!! Html::script('admin/lib/gritter/js/jquery.gritter.js') !!}
  {!! Html::script('admin/lib/gritter-conf.js') !!}
  <!--script for this page-->
  {!! Html::script('admin/lib/sparkline-chart.js') !!}
  {!! Html::script('admin/lib/zabuto_calendar.js') !!}
  {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css') !!}

  {!! Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js') !!}
  {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js') !!}
  @yield('js')
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }

    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#choose')
                  .attr('src', e.target.result)
                  .width(150)
                  .height(200);
          };

          reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  <script>
    function myFunction() {
      alert("Untuk bisa mendownload kartu ujian, harap lengkapi semua data!");
    }
  </script>

<script type="text/javascript">
function JSalert(){
	swal("A Basic JS alert by a plug-in");
}
</script>

<script type="text/javascript">
  $('#datepicker').datepicker({  
     format: 'yyyy-mm-dd'
   });  
</script>  

</html>
