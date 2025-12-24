<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fiscal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FiscalController extends Controller
{
    /**
     * Display a listing of the resource.
    
     */
    public $url='http://integration.epos.uz:8347/uzpos';

    public function index()
    {
        return response()->json([
            'code'=>200,
            'status'=>'ok'
        ],200); 
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
       
        
        //$resData=[];
        $data=$request->all();
        
        $order_id = $data['order_id'] ?? null;
        if($order_id!=null){
            $order=Order::where('id',$order_id)->with('fiscals')->first();
            if(!$order){
                $order_id=null;

            }
        }
        $fiscal_data=$data['fiscal_data'];
        $payments=$data['payments'];
        
        $fiscal=Fiscal::create(
            [
                'order_id'=>$order_id
                ]
            );
        $resData=$this->sell($fiscal_data,$payments,$fiscal->id);
        if($resData['error']==false){
            $fiscal->update([
                'total'=>$resData['total'],
                'fiscal_url'=>$resData['url']['qrCodeURL']
            ]);
            $code=200; 
            $status="ok" ;  
        }else{
            $code=500;
            $status="error";

        }
        

        
       
        return response()->json([
            'code'=>$code,
            'status'=>$status,
            
            'data'=>$resData
        ],$code);
    }

    public function test(){
        $order_id =  null;
        $fiscal_data=[
            [
                "total"=>1200,
                "type"=>"delivery"
            ]
        ];
        $payments=[
            "cash"=>1200,
            "card"=>0
        ];
        $fiscal=Fiscal::create(
            [
                'order_id'=>$order_id
                ]
            );
        $resData=$this->sell($fiscal_data,$payments,$fiscal->id);
       
        $fiscal->update([
            'total'=>$resData['total'],
            'fiscal_url'=>$resData['url']['qrCodeURL']
        ]);

        
       
        dd(json_encode([
            'code'=>200,
            'status'=>'ok',
            
            'data'=>$resData
        ]));

    }




    private function sell($items,$payments,$id){
        $res=[
            'error'=>false,
            'total'=>0,
            'url'=>''
        ];
        $my_items=[
            'delivery'=>[
                'name'=>'Служба доставки товаров',
                'class_code'=>'10112006002000000',
                'package_code'=>'1542432'
            ],
            'collect'=>[
                'name'=>"Boshqa yordamchi xizmat ko’rsatish (yeg'uvchiga)",
                'class_code'=>'10705001001000000',
                'package_code'=>'1495108'

            ]

        ];

        $fs_items=[];
        foreach($items as $item){
            $fs_items[]=[
                "price"=> $item['total']*100, 
                "discount"=> 0,
                "barcode"=> "9973150582171",
                "amount"=> 1000,
                "vatPercent"=> 12,
                "vat"=> $item['total']*100*12/112,
                "name"=> $my_items[$item['type']]['name'],
                "label"=> "",
                "classCode"=> $my_items[$item['type']]['class_code'],
                "packageCode"=> $my_items[$item['type']]['package_code'],
                //"commissionTIN"=> "",
                "other"=>0,
                "ownerType"=>0
            ];
            $res['total']+=$item['total'];
        }
       // curl --location 'http://integration.epos.uz:8347/uzpos' \
        $body=[
            "token"=> "DXJFX32CN1296678504F2",
            "method"=> "sale",
            "companyName"=> "E-POS Systems MCHJ",
            "companyAddress"=> "Toshkent Sh., Yangi Olmazor, 51",
            "companyINN"=> "123456789",
            "staffName"=> "Abdulazizov Shakhboz",
            "printerSize"=> 80,
            //"phoneNumber"=> "+998331234567",
            //"companyPhoneNumber"=> "+998711234567",
            "params"=>[
                "items"=>$fs_items,
                "paycheckNumber"=> $id,
                //"paymentNumber"=> "OTA00004534 от 10.10.2022",
                //"note"=> "За ноябрь",
                //"stateDuty"=> "16500000",
                //"fineAmount"=> "5600000",
                //"contractSum"=> "5000000",
                //"clientName"=> "Khamidov Iskander",
                //"discountCard"=> [
                  //                  "available"=> "1500000",
                    //                "addition"=> "30000",
                      //              "subtraction"=> "0",
                        //            "remainder"=> "1530000"
                          //      ],
                "receivedCash"=> $payments['cash']*100,
                "receivedCard"=> $payments['card']*100,
                "extraInfos"=> [
                                "ЦОТУ"=> "E-POS Systems LLC",
                                "Модель виртуальной кассы"=> "E-POS"
                                ]
            ]
            // "extraInfo"=> [
            //     "tin"=> "915673415",
            //     "pinfl"=> "12345678901234",
            //     "phoneNumber"=> "998991234567",
            //     "carNumber"=> "01A123BC",
            //     "cashedOutFromCard"=> 200000,
            //     "cardType"=> 2,
            //     "pptid"=> "1212322112"
            // ]
        ];
        $response = Http::post($this->url, $body);

        if($response->successful()){

            //dd($response->body());
            $data = $response->json();
            if($data['error']==false){
                $res['url']=$data['info'];
            }else{
                $res['error']=true;
                $res['url']=$data['message'];
            }
        }else{
            $res['error']=true;
            $res['url']=$response->status();


        }
        
       

        return $res;

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
