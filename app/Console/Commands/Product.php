<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Product extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:product {--get} {--post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is product command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
