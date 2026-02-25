<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;

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
        $items=Item::all();
        $this->info($item);
    }
}
