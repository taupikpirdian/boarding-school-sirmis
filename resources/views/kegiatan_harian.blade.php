@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content">
               <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Kegiatan Harian</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <!-- About Company -->
            <div class="section-full box-shadow bg-white content-inner">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12 text-center section-head">
								<h2 class="h2"><span class="text-primary">Program Kegiatan Harian</span></h2>
								<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
								<div class="clear"></div>
                                	<div style="text-align: left; margin-top:30px">
										<div class="kegiatan">
											<table border="1" width="990px">
												<tr align="center" bgcolor="#00BF96">
													<td>Waktu Belajar</td>
													<td>Senin</td>
													<td>Selasa</td>
													<td>Rabu</td>
													<td>Kamis</td>
													<td>Jum'at</td>
													<td>Sabtu</td>
													<td>Ahad</td>
												</tr>
												<tr>
													<td align="center">04.00-04.30</td>
													<td colspan="7">Mengaji Al-Qur'an Individual</td>
												</tr>
												<tr>
													<td align="center">04.30-05.00</td>
													<td colspan="7">Sholat Subuh Berjama'ah</td>
												</tr>
												<tr>
													<td align="center">05.00-05.30</td>
													<td colspan="6">Mengaji Al-QUr'an Sema'an</td>
													<td rowspan="2" align="center" bgcolor="#ADE8E6" border="1">Pengajian umum</td>
												</tr>
												<tr>
													<td align="center">05.30-06.30</td>
													<td colspan="6">Mandi dan sarapan</td>
												</tr>
												<tr>
													<td align="center">06.20-12.40</td>
													<td colspan="4">Belajar Pelajaran Mts dan MA</td>
													<td colspan="2" align="center" bgcolor="#ADE8E6">Kaligrafi dan Qiro'at</td>
													<td rowspan="2" align="center" bgcolor="#ADE8E6">Olahraga, Piket, Mencuci, Ishoma</td>
												</tr>
												<tr>
													<td align="center">12.40-13.20</td>
													<td colspan="6">ISHOMA (Istirahat, Sholat, Makan)</td>
												</tr>
												<tr>
													<td align="center">13.20-14.00</td>
													<td colspan="6">Belajar Pelajaran Mts dan MA</td>
													<td rowspan="3" align="center" bgcolor="#ADE8E6">Barjanji dan Seni Islami</td>
												</tr>
												<tr>
													<td align="center">14.00-14.40</td>
													<td colspan="6">Belajar Pelajaran Mts dan MA</td>
												</tr>

												<tr>
													<td align="center">14.40-15.20</td>
													<td colspan="6">Belajar Pelajaran Mts dan MA</td>
												</tr>

												<tr>
													<td align="center">15.20-16.00</td>
													<td colspan="7">Istirahat dan Sholat</td>
												</tr>

												<tr>
													<td align="center">16.00-16.40</td>
													<td colspan="6">Belajar Pelajaran Mts dan MA</td>
													<td rowspan="3" align="center" bgcolor="#ADE8E6">Istirahat dan Sholat Tahlil dan Ziarah</td>
												</tr>

												<tr>
													<td align="center">16.40-17.20</td>
													<td colspan="6">Belajar Pelajaran Mts dan MA</td>
												</tr>

												<tr>
													<td align="center">17.20-18.00</td>
													<td colspan="6">ISHOMA (Istirahat, Sholat, Makan)</td>
												</tr>
												<tr>
													<td align="center">18.00-19.00</td>
													<td colspan="6">Makan Malam</td>
													<td align="center">Pengajian Umum</td>
												</tr>
												<tr>
													<td align="center">19.00-21.00</td>
													<td colspan="5">Belajar Bersama dengan Bimbingan Tutor (B3T)</td>
													<td align="center" bgcolor="#ADE8E6 ">Muhadoroh</td>
													<td align="center">B3T</td>
												</tr>
												<tr>
													<td align="center">21.00-21.30</td>
													<td colspan="7">Persiapan Tidur</td>
												</tr>
												<tr>
													<td align="center">21.30-03.30</td>
													<td colspan="7">Tidur</td>
												</tr>
											</table>
									</div>
                                </div>
							</div>    
						</div>	
					</div>
				</div>
			</div>            
        </div>
        <!-- contact area  END -->
    </div>
    <!-- Content END-->

@endsection