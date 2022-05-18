@extends('layouts.app')

@section('content')
        <!-- contact area -->
        <div class="content bg-white">
            <!-- About Company -->
            <div class="section-full box-shadow bg-white content-inner">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2 class="h2"><span class="text-primary">Jadwal Pendaftaran</span></h2>
								<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
								<div class="clear"></div>
                                <div style="text-align: left; margin-top:30px">
                                @if($schedulle)
								{!! $schedulle->desc !!}
								@endif
								</div>
							</div>    
						</div>		
					</div>
				</div>
			</div>            
			<!-- About Company END -->
 @endsection