<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Http\Resources\ItemResource;

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
        // Item::upsert(
        //     $data,
        //     ['id'],
        //     [
        //         'name','category_id','partner_id','mark','class_code','package_code','aslbelgi','width','height','length','weight'
        //     ]

        // );
        $inserted=0;
        $updated=0;
        $failed=[];
        $code=200;
        foreach ($data as $item) {
            
            try{

                $currentItem=Item::updateOrCreate(
                    ['id' => $item['id']], // что искать
                    [                      // что обновлять/создавать
                        'name'         => $item['name'],
                        'category_id'  => $item['category_id'],
                        'partner_id'   => $item['partner_id'],
                        'mark'         => $item['mark'],
                        'class_code'   => $item['class_code'],
                        'package_code' => $item['package_code'],
                        'aslbelgi'     => $item['aslbelgi'],
                        'width'        => $item['width'],
                        'height'       => $item['height'],
                        'length'       => $item['length'],
                        'weight'       => $item['weight'],
                    ]
                );
                if ($currentItem->wasRecentlyCreated) {
                    $inserted++;
                } else {
                    $updated++;
                }

            }catch(Exception $e){

                $failed[]=$item['id']??null;
                $code=500;

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
        $data=Item::where('id',$id)->with([
            'category',
            'barcodes',
            'sellPrice',
            'currentStock'
            ])->first();
        
            return [
            'code'=>200,
            'status'=>'ok',
            'data'=>new ItemResource($data)
            //'data'=>$data
        ];
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
        $bToken = $request->header('Authorization');
        
        
        $token=substr($bToken,7);
        if ($token!=="xF38j92x81Sdf93Jskd82HsPzks82ks9aP9a"){
            return [
                'code'=>500,
                'status'=>'error',
                'message'=>"Wrong Token",
                
            ];
        }

        $reqBody=$request->all();
        $page=$reqBody['page'] ?? 0;
        $size = isset($reqBody['size']) 
        ? min((int) $reqBody['size'], 500) 
        : 500;

        $count=Item::count();
        if($count==0){
            return [
                'code'=>400,
                'status'=>'error',
                'message'=>"no Items Found",
                
            ];
        }
        $total=(int) ceil($count/$size);

        if($page>$total){
            return [
                'code'=>500,
                'status'=>'error',
                'message'=>"page number out of range",
                
            ];
        }


        //Price::where('shop_id',1)->firat();
        //$offset=
        //$shop_id=1;
        $data=Item::with([
            'category',
            'barcodes',
            'sellPrice',
            'currentStock'
            ])->offset(($page - 1) * $size)->limit($size)->get();
        
        return [
            'code'=>200,
            'status'=>'ok',
            'page'=>$page,
            'size'=>$size,
            'record_count'=>$count,
            'total_pages'=>$total,
            'data'=>ItemResource::collection($data)
        ];
    }
}
