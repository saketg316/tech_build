<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class,'product_id'); 
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id'); 
    }

    public static function store($product_id, $quantity, $user_id){
        $product = \App\Models\Product::find($product_id);

        $order = new self;
        $order->user_id = $user_id;
        $order->product_id = $product_id;
        $order->order_quantity = $quantity;
        $order->total_cost = $quantity * $product->unit_price;
        $order->save();

        return $order;
    }
}
