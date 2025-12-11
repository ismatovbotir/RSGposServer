<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\WoltController;

class WoltToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wolttoken';

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
        $token=$wolt->woltToken();
           if($token==0){
            $this->info("some error");
           }else{
            $this->info(json_encode($token));
           }
    }
}
