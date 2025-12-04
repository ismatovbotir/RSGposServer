<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        dd($data);
        $order=Order::create(
            [
                "code"=>$data["id"],

            ]
        );
        $items=$data["items"];
        foreach($items as $item){
            $orderItem=OrderItem::create([
                "order_id"=>$order->id,
                "item_id"=>$item["productId"],
                "order_qty"=>$item["price"],
                "order_price"=>$item["quantity"]
            ]);

        }
        OrderStatus::create([
            "order_id"=>$order->id,
            "status"=>"new"
        ]);

        return [
            "id"=>$order->id,
            "status"=>"new"
        ];
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'id'=>$id,
            'status'=>'new'
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
