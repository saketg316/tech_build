<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
Use Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset(Auth::user()->id)) return redirect()->route('login')->with('error','Please Login First');
        
        $products = \App\Models\Product::where('deleted_at', null)->get();

        $data['products'] = $products;
        return view('dashboard',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart(Request $request){
        
    }


    public function checkout(Request $request){

        if(!isset(Auth::user()->id)) return redirect()->route('login')->with('error','Please Login First');
   
        $input = $request->all();
        try{
            \DB::beginTransaction();
            $data = [];
            foreach($input['quantity'] as $product_id => $quantity){
                if(!empty($quantity) && $quantity > 0){
                    $data[] = \App\Models\Order::store($product_id, $quantity, Auth::user()->id);
                    $inventory = \App\Models\Inventory::where('product_id',$product_id)->first();
    
                    if($inventory->available_quantity < $quantity) throw new \Exception('Selected Quantity is greater than Quantity Available');
    
                    if($inventory->available_quantity == 0) throw new \Exception('Product is Out of Stock');
    
                    $inventory->available_quantity = $inventory->available_quantity - $quantity;
                    $inventory->total_quantity_ordered = $inventory->total_quantity_ordered + $quantity;
                    $inventory->save();
                    
                }
            }
    
            if(empty($data)) throw new \Exception('Select Quantity Before Checkout');
            
            \DB::commit();

            $request->session()->flash('success','Order Placed');

            return redirect()->route('orders');

        }catch(\Exception $e){
            \DB::rollback();
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    public function orders(){
        if(!isset(Auth::user()->id)) return redirect()->route('login')->with('error','Please Login First');

        $user = Auth::user();

        $array['orders'] = $orders = \App\Models\Order::where('user_id',$user->id)->orderBy('created_at','desc')->get();

        return view('order',$array);
    }
        
}
