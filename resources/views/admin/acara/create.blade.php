@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
        Acara
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('acara/index')}}">List Acara</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
            {{ Form::open(array('url' => 'acara/create', 'files' => true, 'method' => 'post')) }}

          <div class='form-group clearfix'>
            {{ Form::label("judul", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("judul", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('judul')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_kategori", "Kategori", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_kategori", $kategori_acara, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_kategori')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("isi", "Deskripsi Acara", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-9'>
                {{ Form::textarea("isi", '',['class' => 'form-control required', 'id' => 'ckeditor']) }}
                <span class="error">{{$errors->first('isi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Gambar", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tempat", "Tempat", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("tempat", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('tempat')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("jam", "Jam", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("jam", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('jam')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tanggal", "Tanggal", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <select class="form-control" name="tanggal">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <span class="error">{{$errors->first('tanggal')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("bulan", "bulan", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <select class="form-control" name="bulan">
                  <option value="Jan">Jan</option>
                  <option value="Feb">Feb</option>
                  <option value="Mar">Mar</option>
                  <option value="Apr">Apr</option>
                  <option value="Mei">Mei</option>
                  <option value="Jun">Jun</option>
                  <option value="Jul">Jul</option>
                  <option value="Ags">Ags</option>
                  <option value="Sep">Sep</option>
                  <option value="Oct">Oct</option>
                  <option value="Nov">Nov</option>
                  <option value="Des">Des</option>
                </select>
                <span class="error">{{$errors->first('bulan')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("tahun", "Tahun", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                <select class="form-control" name="tahun">
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                </select>
                <span class="error">{{$errors->first('tahun')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("biaya", "Biaya", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("biaya", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('biaya')}}</span>
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
  
  <!-- wysiwig -->  
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection
