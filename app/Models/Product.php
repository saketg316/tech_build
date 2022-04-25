<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasOne(\App\Models\Inventory::class); 
    }

    public static function store($input){
        $product = new self;
        $product->name = $input['name'];
        $product->image = $input['image'];
        $product->description = $input['description'];
        $product->title = $input['title'];
        $product->unit_price = $input['unit_price'];
        $product->save();

        return $product;

    }
}
