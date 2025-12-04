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
        //dd($data);
        $is_order=Order::where('code',$data['id'])->first();
        //dd($is_order);
        if($is_order){
            return response()->json([
                "id"=>$is_order->id,
                "message"=>"exsisting order"
            ],201);

        }
        try{

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

        return response()->json([
            "id"=>$order->id,
            "status"=>"new"
        ],200);
        
        }catch(\Exception $e){
            return response()->json([
                "error"=>$e->getMessage()
            ],500);
            
        }
        
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
