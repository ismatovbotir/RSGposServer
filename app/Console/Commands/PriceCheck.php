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
        $shop=PriceChecker::first();
        $id=$shop->id;

        $barcode="4780051070073";
        $item=Barcode::where('id',$barcode)->with('item')->first();
        if(!$item){
            return [
                'status'=>'error',
                'message'=>'barcode not fount'
            ];
        }
        //$this->info($item);
        $shop=PriceChecker::where('id',$id)->with('shop')->first();
        //$this->info($shop);
        $price=$shop->shop->price_id;
        
        $nData=PriceData::where('price_id',$price)->where('item_id',$item->item->id)->first();
        $this->info($nData);
        if(!$nData){
            $this->info( 'no pricedata for this item');
        }
        $this->info( $nData->value);

    }
}
