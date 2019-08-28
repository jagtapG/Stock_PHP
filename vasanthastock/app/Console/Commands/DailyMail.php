<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\IssueDetail;
use App\Model\MaterialDetail;
use Mail;

class DailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Daily:Mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily report';

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
        /*$dailyData = MaterialDetail::get();
        echo $dailyData;*/
        \Log::info('i was here @' .\Carbon\Carbon::now());
    }
}
