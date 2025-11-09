@extends('front.layout')

@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")



@section('content')

	<!--Main Breadcrumb Area Start -->
	<div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-title-item text-center">
						<h2 class="title">{{ __('Downloadable') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Downloadable') }}</li>
						</ul>
					</div> <!-- page title -->
				</div>
			</div> <!-- row -->
		</div> <!-- container -->
	</div> 
	
	<!--Main Breadcrumb Area End -->


    
    <!-- User Dashboard Start -->
	<section class="user-dashboard-area section-gap">
		<div class="container">
		  <div class="row">
			<div class="col-lg-3">
				@includeif('user.dashboard-sidenav')
			</div>
			<div class="col-lg-9">
                <div class="card">
                    <h5 class="card-header">{{ __('Downloadable Product') }}</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="user-table-wrapper">
                                    <div class="user-table">
                                        <table class="table table-bordered table-striped">
                                            @foreach ($orders as $id=>$order)
                                                @php
                                                    $cart = json_decode($order->cart,true);
                                                @endphp
                                                @foreach ($cart as $key => $item)
                                                    @if ($item['downloadable_file'])
                                                    <tr>
                                                        <td>
                                                            <h6>{{ $item['title'] }}</h6>
                                                            @if ($item['downloadable_file'])
                                                            <a class="btn btn-success btn-sm mt-3" href="{{asset('assets/front/downloadable/'.$item['downloadable_file']) }}">{{ __('Download File') }}</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		  </div>
		</div>
	
	  </section>
    <!-- User Dashboard End -->



@endsection



