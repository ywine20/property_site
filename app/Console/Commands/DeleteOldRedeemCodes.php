<?php

namespace App\Console\Commands;

use App\Models\RedeemCode;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class DeleteOldRedeemCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'redeem-codes:delete-old-codes';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expirationDate = Carbon::now()->subSeconds(55);
        $expiredCodes = RedeemCode::where('created_at', '<=', $expirationDate)->delete();
        Log::info("$expiredCodes redeem codes have been deleted.");

        $expirationDate = Carbon::now()->subDays(30);
        $expiredCodes = RedeemCode::where('created_at', '<=', $expirationDate)->delete();
        Log::info("$expiredCodes redeem codes have been deleted.");
    }

}
