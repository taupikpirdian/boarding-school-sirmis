@extends('layouts.admin')
@section('content')

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div style="padding-top: 1%; padding-left: 2%;">
	<h2>Data Pendaftaran Siswa Baru</h2>
</div>
<br>
<table>
  <tr>
    <th rowspan="2" scope="col" class="border-1" style="width:10px; text-align: center;">No</th>
    <th colspan="4" scope="col" class="border-1" style="width:10px; text-align: center;">Jumlah</th>
  </tr>
  <tr>
    <td style="width:10px; text-align: center;">Siswa Mondok</td>
    <td style="width:10px; text-align: center;">Siswa Tidak Mondok</td>
    <td style="width:10px; text-align: center;">Keseluruhan</td>
  </tr>
  <tr>
    <td style="width:10px; text-align: center;">#</td>
    <td style="width:10px; text-align: center;">{{ $countSmaMondok }}</td>
    <td style="width:10px; text-align: center;">{{ $countSmaTidakMondok }}</td>
    <td style="width:10px; text-align: center;">{{ $countSma }}</td>
  </tr>
</table>
@endsection