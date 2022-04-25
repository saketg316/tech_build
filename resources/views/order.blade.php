@extends('layout')
  
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card"  style='margin:10px;'>
            <div class="card-header">
                <span class='badge badge-success float-right' style='font-size:15px;'>Total Orders : {{count($orders)}}</span>
                <h3>My Orders</h3>
            </div>

            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (count($orders) > 0)
                <table class='table table-hover'>
                    <tr class='table-primary'>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Unit Cost</th>
                        <th>Qty Ordered</th>
                        <th>Total Cost</th>
                        <th>Ordered At</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->products->name}}</td>
                            <td>{{$order->products->unit_price}}</td>
                            <td>{{$order->order_quantity}}</td>
                            <td>{{$order->total_cost}}</td>
                            <td>{{(new \DateTime($order->created_at))->setTimezone(new \DateTimeZone('Asia/Kolkata'))->format('jS M h:i A')}}</td> {{-- convert to IST --}}
                        </tr>
                    @endforeach
                </table>
                @else
                    <p class='badge badge-danger' style='font-size:25px;margin-top:5px;'>OOPS ! No Orders placed so far. Hurryup !!</p>
                @endif
                
                
            </div>
        </div>
    </div>
</div>
@endsection