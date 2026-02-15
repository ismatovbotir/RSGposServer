<?php

namespace App\Console\Commands;

use App\Models\ApiRequestLog;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

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
        $deleted = ApiRequestLog::where('created_at', '<', Carbon::now()->subDays(7))
        ->delete();

    $this->info("Deleted {$deleted} old api logs.");

    return Command::SUCCESS;
    }
}
