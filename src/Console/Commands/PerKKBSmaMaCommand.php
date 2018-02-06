<?php namespace Bantenprov\PerKKBSmaMa\Console\Commands;

use Illuminate\Console\Command;

/**
 * The PerKKBSmaMaCommand class.
 *
 * @package Bantenprov\PerKKBSmaMa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PerKKBSmaMaCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:persentase-kondisi-kelas-baik-sma-ma';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\PerKKBSmaMa package';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\PerKKBSmaMa package');
    }
}
