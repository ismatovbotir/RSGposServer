<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PriceData;
use Illuminate\Http\Request;

class PriceDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $last=PriceData::max('updated_at');
        return [
            'status'=>'done',
            'data'=> date('YmdHis',strtotime($last))
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->data;
        // PriceData::upsert(
        //     $data,
        //     ['item_id','price_id'],
        //     ['value']

        // );

        //return response()->json(['status' => 'done']);
        $inserted=0;
        $updated=0;
        $failed=[];
        $code=200;
        foreach ($data as $item) {
            
            try{

                $currentItem=PriceData::updateOrCreate(
                    [
                        'item_id' => $item['item_id'],
                        'price_id'=>$item['price_id']
                        
                    ], // что искать
                    [                      // что обновлять/создавать
                        'item_id' => $item['item_id'],
                        'price_id' => $item['price_id'],
                        'value' => $item['value']                       
                    ]
                );
                if ($currentItem->wasRecentlyCreated) {
                    $inserted++;
                } else {
                    $updated++;
                }

            }catch(Exception $e){

                $failed[] = $item['id']??null;
                $code = 500;

            }


        }

        return response()->json([
            'status' => 'done',
            'data'=>[
                'inserted'=>$inserted,
                'updated'=>$updated,
                'failed'=>$failed
            ]
        ],$code);
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
}
