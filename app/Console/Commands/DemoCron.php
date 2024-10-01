<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Discount;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        info("Cron Job running at ". now());
        //
        $affected = DB::table('discounts')
              ->where('deadline','<', now())
              ->update(['status' => 'Expired']);
    }
}
