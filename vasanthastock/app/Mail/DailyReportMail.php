<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;
use App\Model\IssueDetail;
use App\Model\MaterialDetail;
use App\Model\VillaIssue;

class DailyReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sysDate = date("Y-m-d", strtotime( '-1 days' ) );//date('Y-m-d');
        $dailyData = IssueDetail::join('material_details', 'issue_details.material_id', '=',                           'material_details.material_id')
                                ->where('type', '=', 'Add')
                                ->where('material_date', '=', $sysDate)
                                ->get();

        $dailyIssueData = IssueDetail::join('material_details', 'issue_details.material_id', '=',                           'material_details.material_id')
                                ->where('type', '=', 'sub')
                                ->where('material_date', '=', $sysDate)
                                ->get();
            
        //print_r($dailyIssueData); die('oookkk');
        return $this->view('report')
                                ->with('dailyIssueDatas',$dailyIssueData)
                                ->with('dailyDatas',$dailyData)
                                ->to('vasnpx@gmail.com')
                                ->to('mohan@vasanthacity.com');
    }
}
