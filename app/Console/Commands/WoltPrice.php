<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\WoltController;
use App\Models\PriceData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class WoltPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wolt:price';

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
        $price=PriceData::select([
            'item_id as external_id',
            'value as price',
            'true as enabled'
            ])
            ->where('price_id',2)
            //->where('qty',0)
            ->get()
            ->map(function ($item) {
                $item->enabled = true;
                return $item;
            });

        $wolt= new WoltController;
        $res=$wolt->woltPriceUpload(['data'=>$price->toArray()]);
    
        Http::post("https://api.telegram.org/bot8050191968:AAFp2gr1xhqCmOk8tAM32DB1cGF7a-3DUdU/sendMessage", [
            'chat_id' => 125538059,
            'text' => "WOLT - {$price->count} ta maxsulot narxi yuklandi. status: {$res->status()}",
        ]); 
        $this->info($price->count());
    }
}
