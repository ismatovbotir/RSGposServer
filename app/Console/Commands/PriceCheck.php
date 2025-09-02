<?php

namespace App\Console\Commands;

use App\Models\Barcode;
use App\Models\PriceChecker;
use App\Models\PriceData;
use App\Models\Shop;
use Illuminate\Console\Command;

class PriceCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $shop=Shop::first();
        $id=$shop->id;

        $barcode="4780051070073";
        $item=Barcode::where('id',$barcode)->with('item')->first();
        if(!$item){
            return [
                'status'=>'error',
                'message'=>'barcode not fount'
            ];
        }
        $this->info($item);
        $shop=PriceChecker::where('id',$id)->with('shop')->first();
        dd($shop);
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
