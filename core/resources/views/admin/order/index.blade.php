@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Manage Orders') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item">{{ __('Manage Orders') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('Order List:') }}</h3>
               
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                    <table id="idtable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             
                                <th>{{ __('Order Number') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Payment Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $id=>$order)
                            <tr>

                             
                                <td>
                                    {{$order->order_number}}
                                </td>

                                <td>
                                    {{$order->currency_name}} {{$order->total * $order->currency_value}}
                                </td>
                                <td>
                                    @if ($order->order_status == 1)
                                        <p class="badge badge-success p-2">Completed</p>
                                    @elseif($order->order_status == 0)
                                    <p class="badge badge-dark p-2">Pending</p>
                                   
                                    @else
                                    <p class="badge badge-danger p-2">Cancel</p>
                                    @endif
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <button type="button" data-href="{{ route('admin.order.details', $order->id)}}" class="btn btn-primary view_applicant_details btn-sm" data-toggle="modal" data-target="#view_order_details_modal">
                                        <i class="fas fa-eye"></i> {{ __('View') }}
                                    </button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="modal fade" id="view_order_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">{{ __('View Donation Report') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="info_view">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection

