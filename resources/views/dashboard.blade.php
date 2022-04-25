@extends('layout')
  
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card"  style='margin:10px;'>
            <div class="card-header">
                <span class='badge badge-success float-right' style='font-size:15px;'>Total Products : {{count($products)}}</span>
                <h3>Product Catalogue</h3>
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
                @if(count($products) > 0)
                    <form action="{{route('checkout')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @foreach($products as $product)
                            
                                    <div class="col-3 d-flex align-items-stretch">
                                        <div class="card" style="width: 36rem;">
                                            <img src="{{ url($product->image) }}" class="card-img-top" alt="" width='250' height='300'/>
                        
                                            <div class="card-body">
                                            <h5 class="card-title">{{$product->title}} <span class="badge badge-warning float-right" style='font-size:15px;'>Qty : {{$product->inventory->available_quantity}}</span></h5>
                                            <p class="card-text">{{$product->description}}</p>
                                            @if($product->inventory->available_quantity > 0)
                                                <div class="row">
                                                    <div class="col-9">
                                                        <span class='badge badge-secondary' style='font-size:17px;margin-top:5px;'>Price : {{$product->unit_price}} INR</span>
                                                    </div>
                                                    
                                                    <div class="col-3">
                                                        <input type="number" class="form-control" name='quantity[{{$product->id}}]' placeholder="QTY" min='0' max='{{$product->inventory->available_quantity}}' value='0'>
                                                    </div>
                                                </div>
                                            @else
                                                <p class='badge badge-danger' style='font-size:17px;margin-top:5px;'>Out Of Stock</p>
                                            @endif
                                            </div>
                                        </div> 
                                    </div>
                            @endforeach
                        </div>
                        <span class='float-right' style='margin-top:20px;'>
                            <button type='submit' class="btn btn-primary btn-lg">Checkout</button>
                        </span>
                    </form>
                @else
                    <p class='badge badge-danger' style='font-size:25px;margin-top:5px;'>OOPS ! No Products in the Catalogue</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection