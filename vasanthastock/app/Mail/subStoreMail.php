<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Issue;
use App\Model\SubStore;
use App\Model\IssueDetail;
use App\Model\MaterialDetail;
use DB;

class subStoreMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*$queryResult = DB::table('material_entries')
                        ->join('issues', 'material_entries.id', '=', 'issues.central_store_id')
                        ->join('villa_issues', 'issues.id', '=', 'villa_issues.sub_store_id')
                        ->where('issues.id', '=', $this->id)
                        ->select('material_entries.mat_name', 'material_entries.material', 
                                'material_entries.matl_group', 'issues.place_of_issue',
                                'villa_issues.villano', 'villa_issues.qtyv', 
                                'villa_issues.uom', 'villa_issues.issue_date')
                        ->get();*/
        $queryResult = SubStore::join('material_details', 'sub_stores.material_id', '=',                             'material_details.material_id')
                                    ->where('sub_stores.material_id',$this->id)
                                    ->where('sub_stores.issue_place', '=', 'SubStore')
                                    ->orderBy('sub_stores.created_at','desc')
                                    ->first();


        //print_r($this->id); die('hhhhhh');
        //print_r($queryResult); die('hi');
        return $this->view('subStoreMail')
                                    ->with('results', $queryResult)
                                    ->to('vasnpx@gmail.com');
    }
}
