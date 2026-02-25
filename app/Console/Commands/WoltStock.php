<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\WoltController;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Stock;
use Illuminate\Support\Facades\Http;

class WoltStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wolt:stock';

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
        $stock=Stock::select([
                'item_id as external_id',
                'qty as inventory'
                ])
                ->where('shop_id',1)
                ->where('stock_date', Carbon::today())
                //->where('qty',0)
                ->get();

        $wolt= new WoltController;
        $res=$wolt->woltStockUpload(['data'=>$stock->toArray()]);
        
        Http::post("https://api.telegram.org/bot8050191968:AAFp2gr1xhqCmOk8tAM32DB1cGF7a-3DUdU/sendMessage", [
            'chat_id' => 125538059,
            'text' => "WOLT - {$stock->count} ta maxsulot qoldigi yuklandi. status: {$res->status()}",
        ]); 
        $this->info($stock->count());
    }
}
