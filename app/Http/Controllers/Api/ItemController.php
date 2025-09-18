<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=Item::max('id');
        return  response()->json([
                                    'status'=>'done',
                                    'data' => $id
                            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       //'name''mark''mxik''width''height''length''weight'
        
        
        $data=$request->data;
        Item::upsert(
            $data,
            ['id'],
            ['name','category_id','partner_id','mark','class_code','package_code','aslbelgi','width','height','length','weight','volume']

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
    public function items(Request $request){
        return [
            'status'=>'ok',
            'data'=>$request->all()
        ];
    }
}
