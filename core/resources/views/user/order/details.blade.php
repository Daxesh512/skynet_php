
@php
    $user = json_decode($order->user_info,true);
    $cart = json_decode($order->cart,true);
    $shipping_charge_info = json_decode($order->shipping_charge_info,true);
@endphp

<div class="progress-area-step pt-4">
    <ul class="progress-steps">
        <li class="{{$order->order_status == '0' ? 'active' : ''}}">
            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
            <div class="progress-title">{{__('Pending')}}</div>
        </li>
        <li class="{{$order->order_status == '1' ? 'active' : ''}}">
            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
            <div class="progress-title">{{__('Processing')}}</div>
        </li>
        <li class="{{$order->order_status == '2' ? 'active' : ''}}">
            <div class="icon"><i class="fas fa-check-circle"></i></div>
            <div class="progress-title">{{__('Completed')}}</div>
        </li>
        <li class="{{$order->order_status == '3' ? 'active' : ''}}">
            <div class="icon"><i class="fas fa-times-circle"></i></div>
            <div class="progress-title">{{__('Rejected')}}</div>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <b>{{ __('Order Details') }}</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
   
                    <table class="table  table-bordered">
                        <tr>
                            <th>{{ __('Order Id') }}</th>
                            <td>
                                {{ $order->order_number }}
                            </td>
                         </tr>
                        <tr>
                            <th>{{ __('Invoice') }}</th>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{asset('assets/front/invoices/product/'.$order->invoice_number)}}" target="_blank">{{ __('Download Invoice') }}</a>
                            </td>
                         </tr>
                        <tr>
                            <th>{{__('Payment Status')}} :</th>
                            <td>
                                @if($order->payment_status =='0')
                                <span class="badge badge-danger">Pending </span>
                                @else
                                <span class="badge badge-success">Completed  </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('Order Status')}} :</th>
                            <td>
                                @if ($order->order_status == '0')
                                <span class="badge badge-warning"> Pending </span>
                                @elseif ($order->order_status == '1')
                                <span class="badge badge-primary">Processing </span>
                                @elseif ($order->order_status == '2')
                                <span class="badge badge-success"> Completed </span>
                                @elseif ($order->order_status == '3')
                                <span class="badge badge-danger"> Rejected  </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('Paid amount')}} :</th>
                            <td>{{$order->currency_sign}} {{$order->total}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Shipping Info')}} :</th>
                            <td>
                                <strong>Title :</strong> {{ $shipping_charge_info['title'] }} <br>
                                <strong>Duration :</strong> {{ $shipping_charge_info['subtitle'] }} <br>
                                <strong>Cost :</strong> {{$order->currency_sign}}{{ $shipping_charge_info['cost'] }} <br>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('Payment Method')}} :</th>
                            <td>{{Helper::convertUtf8($order->method)}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Transaction Id') }}</th>
                            <td>{{$order->txn_id}}</td>
                         </tr>
                        <tr>
                            <th>{{__('Order Date')}} :</th>
                            <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                 </div>
            </div>
        </div>
    </div>
    
    @if($order->shipping_name && $order->shipping_email && $order->shipping_number &&  $order->shipping_address)
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
                <div class="card-header">
                    <b class="">{{ __('Billing Details') }}</b>
                </div>

                <div class="card-body">
                    <table class="table  table-bordered">
                        <tr>
                            <th>{{__('Email')}} :</th>
                            <td>{{Helper::convertUtf8($order->billing_email)}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Phone')}} :</th>
                            <td> {{$order->billing_number}}</td>
                        </tr>
                        <tr>
                            <th>{{__('State')}} :</th>
                            <td>{{Helper::convertUtf8($order->billing_state)}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Address')}} :</th>
                            <td>{{Helper::convertUtf8($order->billing_address)}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Country')}} :</th>
                            <td>{{Helper::convertUtf8($order->billing_country)}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Zip Code')}} :</th>
                            <td>{{Helper::convertUtf8($order->billing_zip)}}</td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="card card-primary card-outline mt-4">
            <div class="card-header">
                <b >{{ __('Shipping Details') }}</b>
            </div>

            <div class="card-body">
                <table class="table  table-bordered">
                    <tr>
                        <th>{{__('Email')}} :</th>
                        <td>{{Helper::convertUtf8($order->shipping_email)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Phone')}} :</th>
                        <td> {{$order->shipping_number}}</td>
                    </tr>
                    <tr>
                        <th>{{__('State')}} :</th>
                        <td>{{Helper::convertUtf8($order->shipping_state)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Address')}} :</th>
                        <td>{{Helper::convertUtf8($order->shipping_address)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Country')}} :</th>
                        <td>{{Helper::convertUtf8($order->shipping_country)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('Zip Code')}} :</th>
                        <td>{{Helper::convertUtf8($order->shipping_zip)}}</td>
                    </tr>
                </table>
        </div>
    </div>
    </div>
   
    @else 
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                    <div class="card-header">
                        <b>{{ __('Billing Details') }}</b>
                    </div>

                    <div class="card-body">
                        <table class="table  table-bordered">
                            <tr>
                                <th>{{__('Email')}} :</th>
                                <td>{{Helper::convertUtf8($order->billing_email)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Phone')}} :</th>
                                <td> {{$order->billing_number}}</td>
                            </tr>
                            <tr>
                                <th>{{__('State')}} :</th>
                                <td>{{Helper::convertUtf8($order->billing_state)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Address')}} :</th>
                                <td>{{Helper::convertUtf8($order->billing_address)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Country')}} :</th>
                                <td>{{Helper::convertUtf8($order->billing_country)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Zip Code')}} :</th>
                                <td>{{Helper::convertUtf8($order->billing_zip)}}</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    @endif
</div>

 <div class="row mt-4">
     <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>{{__('Image')}}</th>
                <th>{{__('Product')}}</th>
                <th>{{__('Downloadable')}}</th>
                <th>{{__('Quintity')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Total')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cart as $key => $item)
                <tr>
                   <td>{{$key+1}}</td>
                   <td>
                       <img class="w-80" src="{{asset('assets/front/img/'.$item['image'])}}" alt="product" >
                </td>
                   <td>{{Helper::convertUtf8($item['title'])}}</td>
                   <td>
                       @if ($item['downloadable_file'])
                       <a class="btn btn-success btn-sm" href="{{asset('assets/front/downloadable/'.$item['downloadable_file']) }}">Download File</a>
                       @else 
                       {{ __('No File Available') }}
                       @endif
                   </td>
                   <td>
                      <b>{{__('Quantity')}}:</b> <span>{{$item['qty']}}</span><br>
                   </td>
                   <td>{{$order->currency_sign}} {{  Helper::showPriceInOrder($item['price'], $order->currency_value) }}</td>

                   <td>{{$order->currency_sign}} {{round( ($item['price'] * $item['qty'])  * $order->currency_value,2) }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
     </div>
 </div>
