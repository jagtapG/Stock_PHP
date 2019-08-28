<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\IssueDetail;
use App\Model\MaterialDetail;
use Mail;
use DB;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Send:Mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily mail';

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

        echo "hello";
    }
}
