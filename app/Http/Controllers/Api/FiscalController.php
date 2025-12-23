<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fiscal;
use Illuminate\Http\Request;

class FiscalController extends Controller
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
        $request->validate([
            'order_id' => 'nullable|uuid|exists:orders,id',
            'fiscal_data' => 'required|array',
            'fiscal_data.*.total' => 'required|numeric|min:0',
            'fiscal_data.*.type' => 'required|in:items,delivery,collect',
        ]);
        
        $resData=[];
        $data=$request->all();
        $order_id = $data['order_id'] ?? null;
        $fiscal_data=$data['fiscal_data'];
        foreach($fiscal_data as $item){
            $fiscal=Fiscal::create(
                [
                    'order_id'=>$order_id,
                    'total'=>$item['total'],
                    'type'=>$item['type']
    
    
                ]
            );
            $resData[]=$fiscal;

        }
       
        return response()->json([
            'code'=>200,
            'status'=>'ok',
            
            'data'=>$resData
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
