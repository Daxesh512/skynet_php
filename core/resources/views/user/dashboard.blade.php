@extends('front.layout')

@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")

@section('style')
	  <!-- DataTable css -->
	  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.css') }}">
	  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.css') }}">
	  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')

	<!--Main Breadcrumb Area Start -->
	<div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-title-item text-center">
						<h2 class="title">{{ __('Dashboard') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('Dashboard') }}</li>
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
			<div class="col-lg-9 ">
			  <div class="dashboard-inner">
				@if( $visibility->is_shop == 1)
				<div class="row">
					<div class="col-6">
						<div class="card">
							<div class="card-body">
							  <p>{{ __('Total Product Order') }}</p>
							  <h5 class="card-title">{{ $orders->count() }}</h5>
							</div>
						  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="user-table-wrapper">
							<div class="user-table">
								<table class="table table-bordered table-striped data_table">
									<thead>
										<tr>
											<th>{{ __('Order Number') }}</th>
											<th>{{ __('Total') }}</th>
											<th>{{ __('Quintity') }}</th>
											<th>{{ __('Payment Status') }}</th>
											<th>{{ __('Action') }}</th>
										</tr>
									</thead>
									<tbody>
				
										@foreach ($orders as $id=>$order)
										
										<tr>
				
										  <td>{{$order->order_number}}</td>
											<td>
												
												{{$order->currency_sign}} {{$order->total}}
											</td>
											<td>
											   {{ $order->qty }}
											</td>
				
											<td>
												@if($order->payment_status == 0)
													<span class="badge badge-info">{{ __('Pending') }}</span>
												@elseif($order->payment_status == 1)
													<span class="badge badge-success">{{ __('Paid') }}</span>
												@endif
				
											</td>
				
											
											<td>
												<button type="button" data-href="{{ route('user.order.details', $order->id) }}"  class="btn btn-primary view_order_details btn-sm" data-toggle="modal" data-target="#view_order_details_modal">
												{{ __('Details') }}
												  </button>
											</td>
										</tr>
										@endforeach
				
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				@endif
			  </div>
			</div>
		  </div>
		</div>
	
	  </section>
    <!-- User Dashboard End -->


	<div class="modal fade" id="view_order_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLongTitle">{{ __('View Order Details') }}</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" id="order_info_view">
	
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
			</div>
		  </div>
		</div>
	  </div>

@endsection

@section('script')
	<!-- DataTable js -->
<script src="{{ asset('assets/admin/plugins/data-table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.js') }}"></script>

<script>
	 $(".data_table").DataTable();
</script>

@endsection

