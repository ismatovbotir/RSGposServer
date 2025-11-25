<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wolt;

class WoltController extends Controller
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
        //
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
    public function authorization(Request $request){
        
        $headerKey = $request->header('X-API-Key');

        if (!$headerKey || $headerKey !== env('WOLT',"c4a7f8d1b0f45a9f3e6de8a3c22e7df9ff0e76a80b1b6f40b1f9a1227e36b142")) {
            return response()->json([
                'status'  => 'error',
                'message' => 'missing X-API-Key',
            ], 401); // 401 Unauthorized
        }

        $data=$request->all();
        try{
            $newToken=Wolt::Create(
                $data
                
            );
            return response()->json(["status"=>"success"],200);

        }catch(\Exception $e){
            return response()->json([
                                        "status"=>"error",
                                        "message"=>$e->getMessage()
                                    ],500);

        }


    }

    public function woltWebhookOrders(Request $request){
        
        return response()->json(['status' => 'done','data'=>$request->all()]);

    }

    public function woltToken(){
        
    }
}
