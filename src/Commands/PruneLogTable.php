<?php

namespace AdamCrampton\LaravelDatabaseLogger\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

use AdamCrampton\LaravelDatabaseLogger\Models\Log;

class PruneLogTable extends Command
{
    private $expiration;
    private $log;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes any rows in the log table older than configured expiration length (default 14).';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Log $log)
    {
        parent::__construct();

        $this->log = $log;
        $this->expiration = Config::get('database_logger.expiration') ?? 14;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Pruning ' . $this->log->where('created_at', '<', Carbon::now()->subDays($this->expiration))->count() . ' rows from the logs table.');
        $this->log->where('created_at', '<', Carbon::now()->subDays($this->expiration))->delete();
        $this->info('Log pruning complete.');
    }
}
