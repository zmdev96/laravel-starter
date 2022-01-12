<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeOnDevelopment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the project and clear routes cache';

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

        $this->call('config:clear');
        $this->call('route:clear');

        return Command::SUCCESS;
    }
}
