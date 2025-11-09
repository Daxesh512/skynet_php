
    @php
    $user = json_decode($order->user_info,true);
    $cart = json_decode($order->cart,true);
@endphp
<div class="table-responsive">
    <table class="table table-striped table-bordered">
       <tbody>
        <tr>
            <td>{{ __('Order Id') }}</td>
            <td>
                {{ $order->order_number }}
            </td>
         </tr>
          <tr>
             <td>{{ __('Total Amount') }}</td>
             <td>{{$order->currency_sign}}{{round($order->total * $order->currency_value,2)}}</td>
          </tr>
          <tr>
             <td>{{ __('Order Status') }}</td>
             <td>
                 @if($order->order_status == 1)
                    <span class="text-success">{{__('Completed')}}</span>
                 @elseif($order->order_status == 0)
                 <span class="text-warning">{{__('Pending')}}</span>
                 @else
                 <span class="text-danger">{{__('Cancle')}}</span>
                 @endif
             </td>
          </tr>
          
        <tr>
            <td>{{ __('Payment Method') }}</td>
            <td>{{$order->method}}</td>
         </tr>
        <tr>
            <td>{{ __('Transaction Id') }}</td>
            <td>{{$order->txn_id}}</td>
         </tr>

        <tr>
            <td>{{ __('Payment Status') }}</td>
            <td>
                @if($order->payment_status == 1)
                <span class="badge badge-success">{{ __('Paid') }}</span>
                @else
                <span class="badge badge-danger">{{ __('Unpaid') }}</span>
                @endif
            </td>
         </tr>
        <tr>
            <td>{{ __('Order Date') }}</td>
            <td>
                {{ Carbon\Carbon::parse($order->created_at)->format('d/M/Y') }}
            </td>
         </tr>
       </tbody>
    </table>
 </div>

 <div class="row">
     <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quintity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($cart as $item)
            <tr>
                
                <td>
                    <img width="100" src="{{asset('assets/front/img/'.$item['photo'])}}" alt="">
                    <p>{{$item['name']}}</p>
                </td>
                <td>{{$item['price']}}</td>
                <td>{{$item['qty']}}</td>
                <td>{{$order->currency_sign}} {{round(($item['price'] * $item['qty']) * $order->currency_value,2)}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
     </div>
 </div>



 <div class="container text-center">
    <h4>{{__('Order Status')}}</h4>
    <div class="row">
      <div class="col-md-6 offset-3">
          <form action="{{route('admin.order.status')}}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
        <select name="order_status" class="form-control my-2" >
            <option value="0" {{$order->order_status == 0 ? "selected" : ''}} >{{__('Pending')}}</option>
            <option value="1" {{$order->order_status == 1 ? "selected" : ''}} >{{__('Completed')}}</option>
            <option value="2" {{$order->order_status == 2 ? "selected" : ''}}>{{__('Cancle')}}</option>
        </select>
        <button class="btn btn-success" type="submit">{{__('Update')}}</button>
    </form>
      </div>
    </div>
 </div>