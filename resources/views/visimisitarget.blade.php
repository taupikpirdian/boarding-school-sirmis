@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="page-content">
               <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Visi Misi & Tujuan</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content bg-white">
            <!-- About Company -->
            <div class="section-full box-shadow bg-white content-inner">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12 text-center section-head">
								<h2 class="h2"><span class="text-primary">Visi</span></h2>
								<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
								<div class="clear"></div>
                                @foreach($visi_misi as $i=>$visi_misis)
                                    <p>{!! $visi_misis->visi !!}</p>
                                @endforeach
                            </div>    
						</div>	
					</div>
				</div>
			</div>            
			<!-- About Company END -->
             <!-- What peolpe are saying -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
					<div class="section-head text-center ">
						<h2 class="h2"> <span class="text-primary">Misi</span></h2>
						<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
                        @foreach($visi_misi as $i=>$visi_misis)
						<ul class="list-check-circle primary" style="text-align: left;">
                            {!! $visi_misis->misi !!}
                        </ul>
                        @endforeach
					</div>
                </div>
            </div>
            <!-- What peolpe are saying END-->
            <!-- About Company -->
            <div class="section-full box-shadow bg-white content-inner">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12 text-center section-head">
								<h2 class="h2"><span class="text-primary">Tujuan</span></h2>
								<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
								<div class="clear"></div>
                            @foreach($tujuans as $i=>$tujuan)
								<ul class="list-check-circle primary" style="text-align: left;">
                                {!! $tujuan->isi !!}
                                </ul>
                            @endforeach
							</div>    
						</div>	
					</div>
				</div>
			</div>            
			<!-- About Company END -->
             <!-- <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-center ">
                        <h2 class="h2"> <span class="text-primary">Target</span></h2>
                        <div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
                        <ul class="list-check-circle primary" style="text-align: left;">
                                <li>Dapat membaca, menterjemahkan dan memahami sedikitnya 3 (Tiga) buah kitab/buku yang berbahasa Arab dan Inggris dalam setiap satu tahun</li>
                                <li>Dapat berpidato dalam 4 (empat) bahasa; Sunda, Indonesia, Arab dan Inggris,sedikitnya 2 (dua) tema dalam setiap satu tahun</li>
                                <li>Dapat melaprkan resume dan mempresentasikan hasil bacaan minimal 1 (satu) buah buku dalam satu bulan</li>
                                <li>Dapat menghapalkan Al-Qur'an sedikitnya 1 (satu) juz dalam 1 tahun. Capaian akhirnya 10 juz dalam satu tahun sehingga hatam 30 juz dalam 3 tahun</li>
                                <li>Dapat menunjukan prestasi dalam berbagai bidang minimal 1 (satu) kali dalam satu tahun dan minimal ditingkat kelas, dan terus meningkat samapai tingkat kota-propinsi-nasional-internasional</li>
                                <li>Dapat mengucapkan kalimat istighfar sebanyak 70x dalam satu hari atau 14 kali setiap setelah sholat</li>
                                <li>Dapa mengucapkan kalimat tasbih, tahmid, takbir sebanyak masing-masing 33 kali minimal setelah sholat maghrib dan subuh</li>
                                <li>Mendapatkan laporan dari teman, ustadz, orang tua, dan masyarakat karena telah melakukan ucapan dan perbuatan yang baik</li>
                                <li>Terbiasa melakukan sholat sunnah rawatib (Qobla subuh, Qobla-Ba'da Dzuhur, Qobla ashar, Qobla-ba'da maghrib, Qobla-ba'da Isya; Sholat witir, dhuha, dan tahajud) dan puasa sunnah senin-kamis, asyura, rajab, puasa arofah, dan lain-lain</li>
                            </ul>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- contact area  END -->
    </div>
    <!-- Content END-->

@endsection