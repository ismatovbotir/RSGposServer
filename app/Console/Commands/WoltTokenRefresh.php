<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\WoltController;
use Illuminate\Support\Facades\Http;

class WoltTokenRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wolt:tokenrefresh';

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
        $wolt= new WoltController;
        $token=$wolt->woltTokenRefresh();
           // echo($token);
           //'8050191968:AAFp2gr1xhqCmOk8tAM32DB1cGF7a-3DUdU'
           //125538059
           Http::post("https://api.telegram.org/bot8050191968:AAFp2gr1xhqCmOk8tAM32DB1cGF7a-3DUdU/sendMessage", [
            'chat_id' => 125538059,
            'text' => 'Wolt Token yangilandi',
        ]); 
           $this->info(json_encode($token));
    }
}
