<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\FiscalController;

class FiscalClose extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fiscal-close';

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
        $fiscal = app(FiscalController::class);
        $res = $fiscal->closeShift();
        $this->info(json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
