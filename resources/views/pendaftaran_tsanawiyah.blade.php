@extends('layouts.app')

@section('content')
<div style="height: 30px">
</div>

<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
            <div class="media reply_section">
                <div class="center" style="background-color: #fff; height: 70px;">  
                    <h1><br>Pendaftaran Madrasah</h1> 
                    <h1>Tsanawiyah</h1>
                </div>
            <div class="row contact-wrap form-horizontal" style="background-color:#fff">

                    <section class="form-horizontal">
                          <div class="col-md-12"></br>
                            {{ Form::open(array('url' => 'pendaftaran-tsanawiyah/create', 'files' => true, 'method' => 'post')) }}
                                <h3 class="h3-pendaftaran">Data Santri</h3>
                                <hr >
                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("nm_lengkap", "Nama Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nm_lengkap", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Lengkap']) }}
                                      <span class="error">{{$errors->first('nm_lengkap')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("tempat_lahir", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tempat_lahir", '',['class' => 'form-control required', 'placeholder' => 'Masukan Kota Kelahiran']) }}
                                      <span class="error">{{$errors->first('tempat_lahir')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::date("tanggal_lahir", '',['class' => 'form-control required', 'placeholder' => 'Masukan Tanggal Lahir']) }}
                                      <span class="error">{{$errors->first('tanggal_lahir')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("alamat_siswa", "Alamat", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_siswa", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Lengkap']) }}
                                      <span class="error">{{$errors->first('alamat_siswa')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("jk", "Jenis Kelamin", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="jk">
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                      <span class="error">{{$errors->first('nm_lengkap')}}</span>
                                    </div>
                                </div>  

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("no_tlp", "Nomor Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp", '',['class' => 'form-control required', 'placeholder' => 'Masukan No Handphone']) }}
                                      <span class="error">{{$errors->first('no_tlp')}}</span>
                                    </div>
                                </div>           

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("ukuran_seragam", "Ukuran Seragam", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="ukuran_seragam">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("pesantren", "Sambil Pesantren?", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                        <select class="form-control" name="pesantren">
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                </div>

                                <br>  
                                <div class='form-group clearfix md-reg'>
                                  {{ Form::label("photo", "Photo", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4'>
                                      {{ Form::file("photo") }}
                                      <span class="error">{{$errors->first('photo')}}</span>
                                      <div style="height: 3px"></div>
                                      <p style="font-size: 10px">maksimal 200kb</p>
                                    </div>
                                </div>    

                                <br>
                                <h3 class="h3-pendaftaran">Data Ibu</h3>
                                <hr >

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("nama_ibu", "Nama Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nama_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Ibu']) }}
                                      <span class="error">{{$errors->first('nama_ibu')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("tmpt_lahir_ibu", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tmpt_lahir_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Tempat Lahir Ibu']) }}
                                      <span class="error">{{$errors->first('tmpt_lahir_ibu')}}</span>
                                    </div>
                                </div>   

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("alamat_ibu", "Alamat Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_ibu", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Ibu']) }}
                                      <span class="error">{{$errors->first('alamat_ibu')}}</span>
                                    </div>
                                </div>      

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("no_tlp_ibu", "Nomor Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp_ibu", '',['class' => 'form-control required', 'placeholder' => 'Kosongkan Jika tidak Ada']) }}
                                      <span class="error">{{$errors->first('no_tlp_ibu')}}</span>
                                    </div>
                                </div> 

                                <br>
                                <h3 class="h3-pendaftaran">Data Ayah</h3>
                                <hr >

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("nama_ayah", "Nama Ayah", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("nama_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Nama Ayah']) }}
                                      <span class="error">{{$errors->first('nama_ayah')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("tmpt_lahir_ayah", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("tmpt_lahir_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Tempat Lahir Ayah']) }}
                                      <span class="error">{{$errors->first('tmpt_lahir_ayah')}}</span>
                                    </div>
                                </div>

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("alamat_ayah", "Alamat Lengkap", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::textarea("alamat_ayah", '',['class' => 'form-control required', 'placeholder' => 'Masukan Alamat Ayah']) }}
                                      <span class="error">{{$errors->first('alamat_ayah')}}</span>
                                    </div>
                                </div>   

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
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

                                <div class='form-group clearfix md-reg'>
                                    {{ Form::label("no_tlp_ayah", "No Handphone", ['class' => 'col-md-2 control-label']) }}
                                    <div class='col-md-4' style="position: relative;top: 10px; width: 300px">
                                      {{ Form::text("no_tlp_ayah", '',['class' => 'form-control required', 'placeholder' => 'Kosongkan Jika tidak Ada']) }}
                                      <span class="error">{{$errors->first('no_tlp_ayah')}}</span>
                                    </div>
                                </div>
                              
                              <div class='form-group'>
                                <div class='col-md-4 col-md-offset-2'>
                                  <button class='btn btn-primary' style="background-color:#01903C; position: relative; left: 90%" type='submit' name='save' id='save'><span></span> Save</button>
                                </div>
                              </div>
                            {!! Form::close() !!}   
                            <br>
                            <p style="font-size: 12px; margin-left: 25px">Keterangan :</p> 
                            <p style="font-size: 12px; margin-left: 25px">1. Semua data wajib di isi kecuali no handphone ayah dan ibu bila tidak ada.</p>
                            <p style="font-size: 12px; margin-left: 25px">2. Ukuran file photo santri yang akan di upload maksimal 200kb, jika tidak ada boleh mengumpulkan saat mendaftar ulang.</p>
                            <p style="font-size: 12px; margin-left: 25px">3. Persyaratan yang harus dibawa saat daftar ulang bisa dilihat <a href="{{ '/persyaratan' }}">disini.</a></p>
                          </div>
                        </div>
                      </section>
                </div>
                      <div class="media reply_section" style="background-color:#01903C"> <br></br>
                      </div>
                      <br>
                </div> <!-- # media reply_section -->
            </div>
        </div>
    </div>
</div>
</section> <!-- #contact info -->
@endsection