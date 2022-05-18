@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content">
               <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Biaya</li>
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
							<div class="col-md-12 text-center">
								<h2 class="h2"><span class="text-primary">Biaya</span></h2>
								<div class="w3-separator-outer"><div class="w3-separator bg-primary style-liner"></div></div>
								<div class="clear"></div>
                                <div style="text-align: left; margin-top:30px">
                                @if($cost)
                                    {!! $cost->desc !!}
                                @endif
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