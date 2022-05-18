@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
        Pendaftaran Tsanawiyah
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('pendaftaran_tsanawiyah/index')}}">List Pendaftaran</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {{ Form::open(array('url' => 'pendaftaran_tsanawiyah/create', 'files' => true, 'method' => 'post')) }}
          
                                <h3 style="text-align: center;">Data Santri</h3>
                                <hr >

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("nm_lengkap", "Nama Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nm_lengkap", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Lengkap']) }}
                                      <span class="error">{{$errors->first('nm_lengkap')}}</span>
                                    </div>
                                </div>

                                 <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("tempat_lahir", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tempat_lahir", '',['class' => 'form-control required', 'placeholder' => 'Masukan Kota Kelahiran']) }}
                                      <span class="error">{{$errors->first('tempat_lahir')}}</span>
                                    </div>
                                </div>

                                 <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text('tanggal_lahir', '',['id' => 'datepicker','class' => 'form-control required', 'placeholder' => 'Masukan Tanggal Lahir']) }}
                                      <span class="error">{{$errors->first('tanggal_lahir')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("alamat_siswa", "Alamat", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_siswa", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Lengkap']) }}
                                      <span class="error">{{$errors->first('alamat_siswa')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("jk", "Jenis Kelamin", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="jk">
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                      <span class="error">{{$errors->first('nm_lengkap')}}</span>
                                    </div>
                                </div>  

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("no_tlp", "Nomor Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp", '',['class' => 'form-control required', 'placeholder' => 'Masukan No Handphone']) }}
                                      <span class="error">{{$errors->first('no_tlp')}}</span>
                                    </div>
                                </div>           

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("ukuran_seragam", "Ukuran Seragam", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="ukuran_seragam">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("pesantren", "Sambil Pesantren?", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="pesantren">
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                </div>

                                <br>  
                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                  {{ Form::label("photo", "Photo", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4'>
                                      {{ Form::file("photo") }}
                                      <span class="error">{{$errors->first('photo')}}</span>
                                      <div style="height: 3px"></div>
                                      <p style="font-size: 10px">maksimal 200kb</p>
                                    </div>
                                </div>    

                                <br>
                                <h3 style="text-align: center;">Data Ibu</h3>
                                <hr >

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("nama_ibu", "Nama Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nama_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Ibu']) }}
                                      <span class="error">{{$errors->first('nama_ibu')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("tmpt_lahir_ibu", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tmpt_lahir_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Tempat Lahir Ibu']) }}
                                      <span class="error">{{$errors->first('tmpt_lahir_ibu')}}</span>
                                    </div>
                                </div>   

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("alamat_ibu", "Alamat Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Ibu']) }}
                                      <span class="error">{{$errors->first('alamat_ibu')}}</span>
                                    </div>
                                </div>      

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("pekerjaan_ibu", "Pekerjaan", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="pekerjaan_ibu">
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
                                </div> 

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("penghasilan_ibu", "Penghasilan / bulan", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="penghasilan_ibu">
                                            <option value="&#8804; 500.000">&#8804; 500.000</option>
                                            <option value="&#62; 500.000">&#62; 500.000</option>
                                            <option value="&#8805; 1.500.000">&#8805; 1.500.000</option>
                                            <option value="&#8805; 3.000.000">&#8805; 3.000.000</option>
                                            <option value="&#8805; 5.000.000">&#8805; 5.000.000</option>
                                            <option value="&#8805; 10.000.000">&#8805; 10.000.000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("pendidikan_ibu", "Pendidikan Terakhir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="pendidikan_ibu">
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
                                </div>              

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("no_tlp_ibu", "Nomor Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp_ibu", '',['class' => 'form-control required', 'placeholder' => 'Kosongkan Jika tidak Ada']) }}
                                      <span class="error">{{$errors->first('no_tlp_ibu')}}</span>
                                    </div>
                                </div> 

                                <br>
                                <h3 style="text-align: center;">Data Ayah</h3>
                                <hr >

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("nama_ayah", "Nama Ayah", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nama_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Ayah']) }}
                                      <span class="error">{{$errors->first('nama_ayah')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("tmpt_lahir_ayah", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tmpt_lahir_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Tempat Lahir Ayah']) }}
                                      <span class="error">{{$errors->first('tmpt_lahir_ayah')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("alamat_ayah", "Alamat Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Ayah']) }}
                                      <span class="error">{{$errors->first('alamat_ayah')}}</span>
                                    </div>
                                </div>   

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("pekerjaan_ayah", "Pekerjaan", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="pekerjaan_ayah">
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
                                </div> 

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("penghasilan_ayah", "Penghasilan / bulan", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="penghasilan_ayah">
                                            <option value="&#8804; 500.000">&#8804; 500.000</option>
                                            <option value="&#62; 500.000">&#62; 500.000</option>
                                            <option value="&#8805; 1.500.000">&#8805; 1.500.000</option>
                                            <option value="&#8805; 3.000.000">&#8805; 3.000.000</option>
                                            <option value="&#8805; 5.000.000">&#8805; 5.000.000</option>
                                            <option value="&#8805; 10.000.000">&#8805; 10.000.000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("pendidikan_ayah", "Pendidikan Terakhir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      <select class="form-control" name="pendidikan_ayah">
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
                                </div>  

                                <div class='form-group clearfix' style="position: relative; left: 10%;">
                                    {{ Form::label("no_tlp_ayah", "No Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp_ayah", '',['class' => 'form-control required', 'placeholder' => 'Kosongkan Jika tidak Ada']) }}
                                      <span class="error">{{$errors->first('no_tlp_ayah')}}</span>
                                    </div>
                                </div>
          
          <div class='form-group'>
            <div class='col-md-4 col-md-offset-2'>
              <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
            </div>
          </div>
        {!! Form::close() !!}    
      </div>
    </div>
  </section>
@endsection

@section ('js')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        forceParse: false
      });
    });
    </script>
@endsection