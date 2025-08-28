<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Price;
use App\Models\PriceChecker;
use App\Models\PriceData;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->data;
        Price::upsert(
            $data,
            ['id'],
            ['name']

        );
        return response()->json(['status' => 'done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

    public function priceCheck(Request $request){
        $data=$request->all();
        $id=$request['id'];
       
        $barcode=$request['barcode'];
        $item=Barcode::where('id',$barcode)->with('item')->first();
        if(!$item){
            return [
                'status'=>'error',
                'message'=>'barcode not fount'
            ];
        }
        $shop=PriceChecker::where('id',$id)->with('shop')->first();
        $price=$shop->shop->price_id;
        $nData=PriceData::where('price_id',$price)->where('item_id',$item->item->id)->first();
        if(!$nData){
            return [
                'status'=>'error',
                'message'=>'no pricedata for this item'
            ];
        }
        return [
                'status'=>'ok',
                'message'=>[
                    'id'=>$item->item->id,
                    'name'=>$item->item->name,
                    'price'=>$nData->value
                ]
        ];

    }
}
