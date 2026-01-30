<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Fiscal;

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
        $is_order=Order::where('code',$data['id'])->with(['items.item','lastStatus'])->first();
        //dd($is_order);
        if($is_order){
            return response()->json([
                "status"=>"ok",
                "data"=>[
                    "id"=>$is_order->id,
                    "message"=>"exsisting order"

                ]
            ],200);

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
                "order_qty"=>$item["quantity"],
                "order_price"=>$item["price"]
            ]);

        }
        OrderStatus::create([
            "order_id"=>$order->id,
            "status"=>"new"
        ]);

        return response()->json([

            "status"=>"ok",
            "data"=>[
                    "id"=>$order->id,
                    "status"=>"new"
                ]
        ],200);
        
        }catch(\Exception $e){
            return response()->json([
                "status"=>"error",
                "data"=>[
                        "error"=>$e->getMessage()
                ]
            ],500);
            
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order=Order::where('code',$id)->with(['items.item','lastStatus','status','fiscals'])->first();
        //dd($is_order);
        if($order){
            return response()->json([
                'status'=>'ok',
                'data'=>new OrderResource($order)
            ],200);

        }else{
            return response()->json([
                'status'=>'error',
                'data'=>[
                        "message"=>"order not fount"
                ]
            ],400);

        }
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
        $order=Order::where('code',$id)->with(['lastStatus'])->first();
        $data=$request->all();
        $status=$data['status'];
        if($order){
            if($order->lastStatus->status!='new'){
                if($status=="fiscal"){
                    $order->update([
                        'fiscal'=>$data['fiscal']
                    ]);
                    OrderStatus::create([
                        "order_id"=>$order->id,
                        "status"=>"fiscal"
                    ]);
                    Fiscal::create([
                            'order_id'=>$order->id,
                            'type'=>'tems',
                            'fiscal_url'=>$data['fiscal']

                    ]);
                    $o_items=$data["order_items"];
                    foreach($o_items as $o_item){
                        $order_item=OrderItem::where([
                            ['order_id',$order->id],
                            ['item_id',(int)$o_item['code']]
                            ])->first();

                        if($order_item){
                            $order_item->update([
                                "delivery_qty"=>$o_item["qty"],
                                "delivery_price"=>$o_item["price"]  
                            ]);

                        }else{
                            OrderItem::create([
                                    "order_id"=>$order->id,
                                    "item_id"=>(int)$o_item["code"],
                                    "order_qty"=>$o_item["qty"],
                                    "order_price"=>$o_item["price"],
                                    "delivery_qty"=>$o_item["qty"],
                                    "delivery_price"=>$o_item["price"]

                            ]);
                            
                        }

                    }

                }



            }


            return response()->json([
                'status'=>'ok',
                'data'=>new OrderResource($order)
            ],200);

        }else{
            return response()->json([
                'status'=>'error',
                'data'=>[
                        "message"=>"order not fount"
                ]
            ],400);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
