<?php

namespace App\Console\Commands;
use App\Schedule;
use Carbon\Carbon;
use DB ;
use Illuminate\Console\Command;

class TruncateOldItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete auto date ';

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

        $stale_posts = Schedule::where('date', '<', Carbon::now())->get();

       foreach ($stale_posts as $post) {

           $post->update(['expire' => 1]);


       }

    }
}
