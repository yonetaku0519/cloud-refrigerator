<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class YoutubeApiBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:RecipeProposal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'レシピ提案処理';

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
        
        for($i = 0; $i < 5; $i++) {
            echo "aho".PHP_EOL;
        }
        
        
        
        
    }
}
