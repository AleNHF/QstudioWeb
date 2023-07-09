<?php

namespace App\Console\Commands;

use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTokenStatus extends Command
{



    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update token status to false after one hour';

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
        $tokens = Token::where('status', 1)
            ->where('active', true)
            ->where('registerDate', '<', Carbon::now()->setTimezone('America/La_Paz')->subHour())
            ->get();

        foreach ($tokens as $token) {
            $token->active = false;
            $token->save();
        }

        $this->info('Token status updated successfully.');
    }
}
