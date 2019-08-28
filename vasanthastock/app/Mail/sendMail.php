<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\materialEntry;
use App\Model\IssueDetail;
use App\Model\MaterialDetail;

class sendMail extends Mailable
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
        //print_r($this->id); die('hhhhhh');
        //$queryResult = materialEntry::where('id',$this->id)->get();
        $queryResult = IssueDetail::join('material_details', 'issue_details.material_id', '=', 'material_details.material_id')
                                ->where('issue_details.material_id',$this->id)
                                ->where('issue_details.issue_place', '=', 'CentralStore')
                                ->orderBy('issue_details.created_at','desc')
                                ->first();
        //$queryResult = materialEntry::all();
        //print_r($queryResult); die('hooooo');

        return $this->view('email')
                                    ->with('results', $queryResult)
                                    ->to('vasnpx@gmail.com')
                                    ->to('mohan@vasanthacity.com');
    }
}
