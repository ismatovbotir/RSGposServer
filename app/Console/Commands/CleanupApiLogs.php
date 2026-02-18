<?php

namespace App\Console\Commands;

use App\Models\ApiRequestLog;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CleanupApiLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanupApiLogs';

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
        $deleted = ApiRequestLog::where('created_at', '<', Carbon::now()->subDays(5))
        ->delete();

        Http::post("https://api.telegram.org/bot8050191968:AAFp2gr1xhqCmOk8tAM32DB1cGF7a-3DUdU/sendMessage", [
            'chat_id' => 1936361,
            'text' => 'Log Tozalandi',]);

    $this->info("Deleted {$deleted} old api logs.");

    return Command::SUCCESS;
    }
}
