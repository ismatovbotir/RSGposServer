<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pos;
use App\Models\Receipt;
use App\Models\ReceiptItem;
use App\Models\ReceiptPayment;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceiptController extends Controller
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
        
        try{

            $shop = Shop::firstOrCreate(
                ['id' => $data['shop']], // ищем по уникальному полю
                ['name' => "Shop-".$data['shop']]  // создаём если нет
            );
            $pos=Pos::firstOrCreate(
                [
                    'code' => $data['pos'],
                    'shop_id'=>$shop->id
                ], // ищем по уникальному полю
                [
                    'name' => "Pos-".$data['pos']
                ]  // создаём если нет
            );
           $receiptDate=$this->frontolDate($data['dateOpen']);
            $receipt=Receipt::create(
            [
                'no'=>$data['no'],
                'barcode'=>$data['barcode'],
                'shift'=>$data['shift'],
                'receipt_date'=>$receiptDate,
                //'dateOpen'=>'',
                //'dateClose'=>'',
                'type'=>$data['type'],
                'cashier'=>$data['cashier'],
                'consultant'=>$data['consultant'],
                'shop_id'=>$shop->id,
                'pos_id'=>$pos->id,
                'status'=>$data['status'],
                //'client_id'=>'';
                //'client_card'=>nullable();
                //'client_name'=>nullable();
                //'client_phone'=>nullable();
                'sub_total'=>$data['sub_total'],
                'discount'=>$data['discount'],
                'total'=>$data['total'],
                'created_at'=>$receiptDate,
                'updated_at'=>now(),
                'fiscal'=>$data['fiscal']

            ]
        );
        $items=$data["items"];
        foreach($items as $item){
            ReceiptItem::create([
                'receipt_id'=>$receipt->id,
                'item_id'=>$item["item_id"],
                'status'=>$item['status'],
                'qty'=>$item['qty'],
                'price'=>$item['price'],
                'sub_total'=>$item['sub_total'],
                'discount'=>$item['discount'],
                'round'=>$item['round'],
                'total'=>$item['total']
            ]);

        }
        $payments=$data["payments"];
        foreach($payments as $payment){
            ReceiptPayment::create([
                'receipt_id'=>$receipt->id,
                'type'=>$payment['type'],
                'value'=>$payment['value']
                
            ]);
        }
        return response()->json([

            "status"=>"ok",
            "data"=>[
                    "id"=>$receipt->id,
                    "status"=>"stored"
                ]
        ],200);
        
        }catch(\Exception $e){
            return response()->json([
                "status"=>"error",
                "data"=>[
                        "error"=>$e->getMessage()
                ]
            ],505);
            
        }
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

    public function frontolDate($value){
        if (!$value) {
            return null;
        }

        $value = trim($value);

        try {
            // Если год 2-значный
            if (preg_match('/\d{2}\.\d{2}\.\d{2}\s\d{2}:\d{2}:\d{2}/', $value)) {
                $date = Carbon::createFromFormat('d.m.y H:i:s', $value);
            }
            // Если год 4-значный
            elseif (preg_match('/\d{2}\.\d{2}\.\d{4}\s\d{2}:\d{2}:\d{2}/', $value)) {
                $date = Carbon::createFromFormat('d.m.Y H:i:s', $value);
            } else {
                return null;
            }

            return $date->format('Y-m-d H:i:s');

        } catch (\Exception $e) {
            return null;
        }
    

    }
}
