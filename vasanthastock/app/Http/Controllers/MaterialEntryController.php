<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\materialEntry;
use App\Model\plantEntry;
use App\Model\UseOfMaterial;
use App\Model\AddedStock;
use App\Model\Issue;
use App\Model\VillaIssue;
use App\Model\MaterialDetail;
use App\Model\IssueDetail;
use App\Model\SubStore;
use App\Mail\sendMail;
use App\Mail\subStoreMail;
use App\Mail\dailyReport;
use App\Mail\DailyReportMail;
use Mail;
use Redirect;
use DB;
use Session;
use Validator;
use Auth;
use App\User;
use File;


/**
* -----------------------------------------------------------------------------
*   MaterialEntryController class
* -----------------------------------------------------------------------------
* Contorller having methods to handle insert material reords,
* view records and update records .This class consists of
* methods that are used to perform the basic operations
* on material data such as material creation,  updation etc.
*
*
* @package  App\Http\Controllers
* @since    1.0.0
* @version  1.0.0
* @author   Npodax Technologies Pvt. Ltd. <mbk@nprodax.com>
*/



class MaterialEntryController extends Controller
{


   /**
    * Insert record in table material_entries
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function insert(Request $request){
        //hold all records
        $data = $request->all();
        $data['type'] = 'Add';
        //print_r($data);die('yes');
        $data['date'] = date('d-m-y');

        //validation for fields
        $validate = Validator::make($data,[
                                    'material_id'          => 'required|unique:material_details',
                                    'material_name'        => 'required',
                                    'material'             => 'required',
                                    'material_description' => 'required',
                                    'material_group'       => 'required',
                                    'material_gross'       => 'required',
                                    'material_tare'        => 'required',
                                    'material_netweight'   => 'required',
                                    'uom'                  => 'required',
                                    'vehicle_no'           => 'required',
                                    'material_location'    => 'required',
                                    'stock'                => 'required',
                                    'alert_quantity'       => 'required',
                                    'issue_place'          => 'required',
                                ]);
        //return error when any field is empty
       /* if($validate->fails()){
            return redirect()
                        ->back()
                        ->withErrors('This id is all ready exist');
        }*/
        //create new record
        $insert = MaterialDetail::create($data);

        $issueData = IssueDetail::create($data);

        //return msg record is inserted
        return redirect()
                    ->back()
                    ->withErrors('Material entry successfully inserted');
    }
    //-------------------------------------------------------------------------

    /**
    * Load the materialreport file for view 
    * all material record
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getRecords(){

    	$arrayResult = MaterialDetail::join('issue_details', 
                                             'material_details.material_id', '=', 'issue_details.material_id'
                                            )
                                      ->get();

        $resultArray=[];
        foreach ($arrayResult as $key => $value) {
            $resultArray[$key] = $value->material_id;
        }
        
        $unique_mat_id = array_unique($resultArray);
        
        foreach ($unique_mat_id as $key => $value){
         
            $materialEntries = MaterialDetail::join('issue_details', 'material_details.material_id', '=',                                 'issue_details.material_id')
                                          ->where('issue_details.material_id', $value)
                                          ->where('issue_details.issue_place', 'CentralStore')
                                          ->orderBy('issue_details.created_at','desc')  
                                          ->first();
            $result[] = $materialEntries;
        }
        
        if(!empty($result)){

            foreach ($result as $key => $value) {
            
                $issue = IssueDetail::where('material_id',$result[$key]['material_id'])
                             ->select('subtract_quantity')
                             ->get();

                $count = count($issue)-1;
                $total = 0;
                for($i=0; $i<=$count; $i++){

                    $total += $issue[$i]['subtract_quantity'];
                }

                $result[$key]['issueqty'] = $total;
            }

            return view('materialReport')
                    ->with('results', $result);

          }
          else{
            Session::flash('alert-warning', 'Data not available');
            return redirect('material');

          }         
    }
    //-------------------------------------------------------------------------

    /**
    * Insert plant record in plant_entries table
    * 
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function plantData(Request $request){

        $querydata = $request->all();
        
        $data = plantEntry::create($querydata);
        
        return redirect()
                ->back()
                ->withErrors('Plant entry successfully inserted');
    }
    //-------------------------------------------------------------------------

    /**
    * Load the plantReport file for view 
    * all plant record
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function plantRecords(){
    	$queryresult = plantEntry::all();
    	
    	return view('plantReport')
                ->with('results', $queryresult);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the usages file for issue material  
    * from central store or sub store
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function usagesRecords(){
    	$queryresult = materialEntry::all();
    	
    	return view('usages')
                ->with('results', $queryresult);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the login file for user can login  
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function login(Request $req){
    	$username = $req->input('username');
        $password = $req->input('password');

        $data = $req->all();

        $userRecord = User::where('name', $data['username'])
                            ->where('password',$data['password'])
                            ->first();
                            
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect('material');
        }

        return redirect()->back()->withErrors('Username or Password not correct');
    }
    //-------------------------------------------------------------------------

    /**
    * Load the logout file for logout user
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function logout(){ 
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    //-------------------------------------------------------------------------

    /*public function getData($id){
    	$getData = materialEntry::where('id',$id)
    	                 ->get();
    	//print_r($getData); die('okkk');                 
    	return view('usagesReport')->with('getData', $getData);
    }*/
    //-------------------------------------------------------------------------

    /**
    * Load the getPlantData file for all material  
    * records from central store 
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getPlantData($plant){

    	$plantName = $plant;

        $arrayIssue = IssueDetail::select('material_id')
                                        ->get();

        $issueArray=[];
        foreach ($arrayIssue as $key => $value) {
            $issueArray[$key] = $value->material_id;
        }
        
        $unique_issue_id = array_unique($issueArray);
        
        foreach ($unique_issue_id as $key => $value){
         
            $issueEntries = IssueDetail::join('material_details', 'issue_details.material_id', '=',                         'material_details.material_id')
                                        ->where([
                                                    ['issue_details.material_id', $value],
                                                    ['issue_details.issue_place',$plantName]
                                                ])
                                        ->orderBy('issue_details.created_at','desc')  
                                        ->first();
            $plantData[] = $issueEntries;
           
        }
        //print_r($plantData);die('plant');
    	return view('plantMaterial')
                    ->with('plantData', $plantData);
    }
    //-------------------------------------------------------------------------

    /**
    * Display selected material name    
    * records from material_entries table 
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function selectMatName($matName){
        $materialName = $matName;
        //print_r($materialName);die('ok');
        $materialNameData = IssueDetail::join('material_details', 'issue_details.material_id', '=',                            'material_details.material_id')
                                        ->where('issue_details.material_id', $materialName)
                                        ->where('issue_details.issue_place', '=', 'CentralStore')
                                        ->orderBy('issue_details.created_at','desc')
                                        ->first();
        //print_r($materialNameData);die('ok');
        return view('selectMatName')
                    ->with('nameData', $materialNameData);
    }
    //-------------------------------------------------------------------------

    /**
    * Add new quantity to added_stock and  
    * update qunatity and material locaction
    * in table material_entries
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function updateMaterials(Request $req){

        $data = $req->all();
        //print_r($data); die('ok');
        $validate = Validator::make($data,[
                                        'stock'             => 'required',
                                        'material_date'     => 'required',
                                        'material_location' => 'required',
                                    ]);
        if($validate->fails()){
            return redirect()
                        ->back()
                        ->withErrors('All fields are required');
        }


        /* $updateMatStock = materialEntry::where('id',$data['matid'])
                                        ->first();
        
        $prvStock = $updateMatStock['quantity'];
        
        $addedStock = DB::table('added_stocks')
                    ->insert([['newaddstock' => $data['newaddstock'], 
                            'prvstock' => $data['stock'],
                            'datetime' => $data['datetime'],
                            'matid' => $data['id'], 
                            'matloc' => $data['matloc']]]);*/ 

        $data['add_quantity'] = $data['stock'];

        $newStock = $data['rstock'] + $data['stock'];

        $data['stock'] = $newStock;

        $data['type'] = "Add";

        $addGros = MaterialDetail::where('material_id',$data['material_id'])
                                ->first();

        $newGros = $addGros['material_gross'] + $data['material_gross'];

        $newTare = $addGros['material_tare'] + $data['material_tare'];

        $newNetweight = $addGros['material_netweight'] + $data['material_netweight'];

        $data['material_gross'] = $newGros;

        $data['material_tare'] = $newTare;

        $data['material_netweight'] = $newNetweight; 

        $updateGors = MaterialDetail::where('material_id',$data['material_id'])
                                    ->update(['material_location'  =>$data['material_location'],
                                              'material_gross'     =>$data['material_gross'],
                                              'material_tare'      =>$data['material_tare'],
                                              'material_netweight' =>$data['material_netweight']
                                            ]);

        //print_r($newGros);die('ok');

        $AddedStock = IssueDetail::create($data);
        
        /*$add =  $updateMatStock['quantity'] + $data['newaddstock'];
        
        $addedStock = materialEntry::where('id', $data['matid'])
                                    ->update(['quantity' => $add,
                                    'mat_loc' =>$data['matloc']]);*/
        
        return redirect()
                    ->back()
                    ->withErrors('Stock update successfully');
    }
    //-------------------------------------------------------------------------

    /**
    * Load the selectPlant file for view all  
    * selected store/plant material name
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function selectPlant($pltName){
        $pltnm = $pltName;

       // print_r($pltnm); die('pl');

        $pltData = IssueDetail::join('material_details', 'issue_details.material_id', '=',                         'material_details.material_id')
                              ->where('issue_details.issue_place', $pltnm)
                              ->select('issue_details.material_id', 'material_name', 'material_group')
                              ->Distinct()
                              ->get();

        //print_r($pltData);die('ok');

        return view('selectMaterial')
                    ->with('matNames', $pltData);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the useMaterial file for view material  
    * from central which to select for issue
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function editPlant($id){
    	$matId = $id;
        //print_r($matId); die('ok');
    	$matData = IssueDetail::join('material_details', 'issue_details.material_id', '=', 'material_details.material_id')
                                ->where('issue_details.material_id', $matId)
                                ->where('issue_details.issue_place', '=', 'CentralStore')
                                ->orderBy('issue_details.created_at','desc')
                                ->first();
    	//print_r($matData); die('hello');
    	return view('useMaterial')
                  ->with('matDatas', $matData);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the useMaterialRecord file for issue material  
    * from central store to sub store or villa it insert
    * in issue table
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function useMaterialRecord(Request $request){
        $record = $request->all();

        $record['type'] = 'sub';

        //print_r($record);die('mat');

        $record['date'] = date('d-m-Y');

        $validate = Validator::make($record,[
            'material_date'      => 'required',
            'subtract_quantity'  => 'required',
            'uom'                => 'required',
            'issue_place'        => 'required',
        ]);

        if($validate->fails()){
            return redirect()
                   ->back()
                   ->withErrors('All fields are required');
        }


        $updateData = DB::table("material_details as md")
                          ->join('issue_details as mid', 'md.material_id', '=', 'mid.material_id')
                          ->where('mid.material_id', $record['material_id'])
                          ->orderBy('mid.created_at','desc')  
                          ->first();

        //print_r($updateData); die('ok');
        if($updateData->stock >= $record['subtract_quantity']){

         	$cal = $updateData->stock-$record['subtract_quantity'];

         	$mStock = IssueDetail::where('material_id', $record['material_id'])
                                    ->update(['stock' => $cal]);
        }
        else{
         	return redirect()
                ->back()
                ->withErrors('Available quantity is less you enter more quantity value');
        }                 
        //unset($record['quantity']); 
        $useMaterial = IssueDetail::create($record);

        $subStoreData = SubStore::select('material_id')
                                        ->get();

        //print_r($subStoreData);die('dbdata');

        $subArray=[];
        foreach ($subStoreData as $key => $value) {

            $subArray[$key] = $value->material_id;
        }

        if($record['issue_place'] == 'SubStore'){

            $record['type'] = 'add';

            $record['add_quantity'] = $record['subtract_quantity'];

            $record['stock'] = $record['subtract_quantity'];
            
            if(in_array($record['material_id'], $subArray)){

                $subQtyData = SubStore::select('stock')
                                        ->where('material_id', '=', $record['material_id'])
                                        ->orderBy('id', 'DESC')
                                        ->first();

                $subTotal = $subQtyData['stock'] + $record['subtract_quantity'];

                $record['stock'] = $subTotal;
            }
            
            $record['subtract_quantity'] = 0;

            $subStoreMaterial = SubStore::create($record);
        }

        $checkData = DB::table("material_details as md")
                                          ->join('issue_details as mid', 'md.material_id', '=', 'mid.material_id')
                                          ->where('mid.material_id', $record['material_id'])
                                          ->where('mid.issue_place', '=', 'CentralStore')
                                          ->orderBy('mid.created_at','desc')  
                                          ->first();
        //print_r($checkData);die('ok');

        if($checkData->stock < $checkData->alert_Quantity){
          // print_r($checkData->alert_Quantity);die('inmail');
            Mail::send(new sendMail($checkData->material_id));
        } 
        return redirect()
                        ->back()
                        ->withErrors('Stock use successfully');
    }
    //-------------------------------------------------------------------------

    /**
    * Load the addedStockReport file for view  
    * added new  and previous quantity/stock
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function addedStockReport(){
        $addedStockReports = materialEntry::join('added_stocks', 'material_entries.id', '=', 'added_stocks.matid')
                            ->get();
        return view('addedStockReport')
                            ->with('stockReports', $addedStockReports);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the subStore file for view all material  
    * from sub store 
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function subStore($subplant){

        $storeName = $subplant;

        $arraySub = SubStore::select('material_id')
                                        ->get();

        $subArray=[];
        foreach ($arraySub as $key => $value) {
            $subArray[$key] = $value->material_id;
        }

        $unique_sub_id = array_unique($subArray);

        $counter = 0;

        foreach ($unique_sub_id as $key => $value){
            $queryResult = [];
            $queryResult = SubStore::join('material_details', 'sub_stores.material_id', '=',                         'material_details.material_id')
                                    ->where('sub_stores.material_id', $value)
                                    ->where('sub_stores.issue_place',$storeName)
                                    ->orderBy('sub_stores.created_at','desc')
                                    ->first();

            if(!empty($queryResult)){
                $subEntries[$counter] = $queryResult;
                $counter++;
            }

            //$substoredetails[] = $subEntries;
        }
        //print_r($unique_sub_id);die('sub');
        //return $subEntries;
        return view('substore')
                ->with('substores', $subEntries);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the subStoreIssue file for view material  
    * select material from sub store
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function subStoreIssue($subStoreId){
        $id = $subStoreId;
        $subStoreData =  SubStore::join('material_details', 'sub_stores.material_id', '=',                            'material_details.material_id')
                                 ->where('sub_stores.material_id', '=', $id)
                                 ->where('sub_stores.issue_place', '=', 'SubStore')
                                 ->orderBy('sub_stores.created_at', 'desc')
                                 ->first();
        //print_r($subStoreData);die('sub');
        return view('subStoreIssue')
                ->with('subStoreDatas', $subStoreData);
    }
    //-------------------------------------------------------------------------

    /**
    * Load the getVillaData insert issue material  
    * from sub store to villa_issue table
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getVillaData(Request $req){
        $villaData = $req->all();
        
        //print_r($villaDataArray);die('villa');
        $validate = Validator::make($villaData,[
                                    'issue_date'   => 'required',
                                    'qtyv'         => 'required',
                                    'villano'      => 'required',
                                    ]);
        if($validate->fails()){
            return redirect()
                    ->back()
                    ->withErrors('All fields are required');
        }

        $updateData = SubStore::join('material_details', 'sub_stores.material_id', '=',                            'material_details.material_id')
                                ->where('sub_stores.material_id',$villaData['sub_store_id'])
                                ->orderBy('sub_stores.created_at', 'desc')
                                ->first();
        

        if($updateData->stock >= $villaData['qtyv']){

            $subtract = $updateData->stock - $villaData['qtyv'];

            
            $subStock = SubStore::where('material_id', $villaData['sub_store_id'])
                                    ->update(['stock' => $subtract]);
            
        }
        else{
            return redirect()
                ->back()
                ->withErrors('Available quantity is less you enter more quantity value');
        } 

        $villaDataArray =  [ 
                         'material_id'       => $villaData['sub_store_id'],
                         'material_date'     => $villaData['issue_date'],
                         'stock'             => $subtract,
                         'villa_number'      => $villaData['villano'],
                         'uom'               => $villaData['uom'],
                         'type'              => 'sub',
                         'issue_place'       => 'Villa',
                         'subtract_quantity' => $villaData['qtyv']
                       ];

        $useMaterial = SubStore::create($villaDataArray);

        $VillaIssue = VillaIssue::create($villaData);

        $checkData = SubStore::join('material_details', 'sub_stores.material_id', '=',                        'material_details.material_id')
                                ->where('sub_stores.material_id', $villaData['sub_store_id'])
                                ->where('sub_stores.issue_place', '=', 'SubStore')
                                ->orderBy('sub_stores.created_at','desc')  
                                ->first();

        //print_r($checkData['material_id']);die('checkData');

        if($checkData['stock'] < $checkData['alert_quantity']){
            
            Mail::send(new subStoreMail($checkData['material_id']));
        } 
        return redirect()
                ->back()
                ->withErrors('Issue successfully');
    }
    //-------------------------------------------------------------------------

    /**
    * Display all substore records from  
    * table issue
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function subStoreReport(){

        $arraySubReport = SubStore::select('material_id')
                                        ->get();

        $subReportArray=[];

        foreach ($arraySubReport as $key => $value) {

            $subReportArray[$key] = $value->material_id;
        }

        $unique_sub_report = array_unique($subReportArray);

        foreach ($unique_sub_report as $key => $value){
         
            $subReportEntries = SubStore::join('material_details', 'sub_stores.material_id', '=',                         'material_details.material_id')
                                    ->where([
                                            ['sub_stores.material_id', $value],
                                            ['sub_stores.issue_place', 'SubStore']
                                         ])
                                    ->orderBy('sub_stores.created_at','desc')
                                    ->first();

            $subStoreReport[] = $subReportEntries;
        }
        //print_r($subStoreReport);die('subStoreReport');

        if(!empty($subStoreReport)){

            foreach ($subStoreReport as $key => $value) {
            
                $issue = SubStore::where('material_id',$subStoreReport[$key]['material_id'])
                                    ->select('subtract_quantity')
                                    ->get();

                $count = count($issue)-1;
                $total = 0;
                for($i=0; $i<=$count; $i++){

                    $total += $issue[$i]['subtract_quantity'];
                }

                $subStoreReport[$key]['issueSubQty'] = $total;
            }

            return view('subStoreReport')
                ->with('subStoreReports', $subStoreReport);

          }
          else{
            Session::flash('alert-warning', 'Data not available');
            return redirect('material');

          }  
    }
    //-------------------------------------------------------------------------

    /**
    * Display all villa recods from three   
    * tables material_entries, issues and villa_issues
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getVillaReport(){

        $getVillaData = IssueDetail::join('material_details', 'issue_details.material_id', '=',                               'material_details.material_id')
                                    ->where('issue_details.issue_place', '=', 'Villa')
                                    ->get();
        //print_r($getVillaData);die('ok');
        $getVillaSub = SubStore::join('material_details', 'sub_stores.material_id', '=',                              'material_details.material_id')
                                    ->where('sub_stores.issue_place', '=', 'Villa')
                                    ->get();

        return view('villaReport')
                                ->with('villaReports', $getVillaData)
                                ->with('VillaCentrals', $getVillaSub);
        //print_r($getVillaData); die('noooooo');
    }
    //-------------------------------------------------------------------------

    /**
    * Display all central store in and out records by current date  
    * fron tables material_entries and issues
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    /*public function dailyReport(){
        
        //Mail::send(new DailyReportMail());
    }*/
    //------------------------------------------------------------------------=

    public function cronReport(){
        Mail::send(new DailyReportMail());
    }
    /**
    * Display all records from table material_entries
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function materialWiseReport(){
        $matWiseReport = MaterialDetail::join('issue_details', 'material_details.material_id', '=',                            'issue_details.material_id')
                                        ->select('issue_details.material_id', 'material_name', 'material_group')
                                        ->Distinct()
                                        //->orderBy('issue_details.created_at','desc')
                                        ->get();


        //print_r($matWiseReport);die('ok');
        return view('materialWiseReport')
                    ->with('matWiseReports', $matWiseReport);
    }
    //-------------------------------------------------------------------------

    /**
    * Display all issue info by selected material  
    * name
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function matWiseData($id){
        $matWiseDataId = $id;
        
        $matRecord = MaterialDetail::join('issue_details', 'material_details.material_id', '=', 'issue_details.material_id')
                        ->where('issue_details.material_id',$matWiseDataId)
                        ->get();
        //print_r($matRecord);die('ok');
        return view('materialWiseReportView')
                    ->with('matRecords', $matRecord);

    }
    //-------------------------------------------------------------------------

    /**
    * Display all central store records from two date  
    * from material_entries table
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function dateSearch(Request $req){

       $dateSearch = $req->all();
       
        $search = IssueDetail::join('material_details', 'issue_details.material_id', '=',                        'material_details.material_id')
                             ->whereBetween('issue_details.material_date',[$dateSearch['fromdate'], 
                                             $dateSearch['todate']])
                             ->where('issue_details.issue_place', '=', 'CentralStore')
                             ->get();

        //print_r($search); die('ozzzzz');

        return view('dateSearch')->with('searchs', $search);
    }
    //-------------------------------------------------------------------------

    /**
    * Display all sub store records from two date  
    * from material_entries and issue table
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function subStoreDateSearch(Request $request){
        $subDateSearch = $request->all();

        $arraySubReportDate = SubStore::select('material_id')
                                        ->get();

        $subReportDateArray=[];
        foreach ($arraySubReportDate as $key => $value) {
            $subReportDateArray[$key] = $value->material_id;
        }

        $unique_sub_date = array_unique($subReportDateArray);

        foreach ($unique_sub_date as $key => $value){
         
            $subReportDateEntries = SubStore::join('material_details', 'sub_stores.material_id', '=',                         'material_details.material_id')
                                    ->where([
                                            ['sub_stores.material_id', $value],
                                            ['sub_stores.issue_place', 'SubStore']
                                         ])
                                    ->orderBy('sub_stores.created_at','desc')
                                    ->first();

            $storeSearch[] = $subReportDateEntries;
        }

        if(!empty($storeSearch)){

            foreach ($storeSearch as $key => $value) {
            
                $issue = SubStore::where('material_id',$storeSearch[$key]['material_id'])
                                    ->select('subtract_quantity')
                                    ->get();

                $count = count($issue)-1;
                $total = 0;
                for($i=0; $i<=$count; $i++){

                    $total += $issue[$i]['subtract_quantity'];
                }

                $storeSearch[$key]['issueSubQty'] = $total;
            }
          }

        //print_r($storeSearch);die('date');  

        return view('subStoreDateSearch')
                    ->with('storeSearchs', $storeSearch); 
    }
    //-------------------------------------------------------------------------

    /**
    * Display all villa records from two date  
    * from material_entries, issues and villa_issue table
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function villaDateSearch(Request $req){

        $villaDateSearch = $req->all();

        $dateReport = IssueDetail::join('material_details','issue_details.material_id', '=',                            'material_details.material_id')
                                  ->where('issue_details.issue_place','=','villa')
                                  ->whereBetween('material_date', [$villaDateSearch['fromdate'], 
                                                $villaDateSearch['todate']])
                                  ->get();
        //print_r($dateReport);die('villadate');
        $dateVillaSearch = SubStore::join('material_details', 'sub_stores.material_id', '=',                                 'material_details.material_id')
                                    ->join('villa_issues', 'sub_stores.material_id', '=',            'villa_issues.sub_store_id')
                                    ->where('sub_stores.issue_place','=','villa')
                                    ->whereBetween('villa_issues.issue_date',
                                            [$villaDateSearch['fromdate'], 
                                            $villaDateSearch['todate']]
                                          )
                                    ->get();
        
        return view('villaDateSearch')
                        ->with('dateReports', $dateReport)
                        ->with('dateVillaSearchs', $dateVillaSearch);
    }
    //-------------------------------------------------------------------------

    /**
    * It will send email when user login
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getReport(){
        $report = materialEntry::all();
        $subReport = Issue::all();
        Mail::send(new dailyReport($report, $subReport));

        return view('materialEntry');
    }
    //-------------------------------------------------------------------------

    /**
    * It will import only CSV file
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    /*public function importCsv(Request $request){
        if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !==FALSE){
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            
            fgetcsv($handle);
            
            while(($data = fgetcsv($handle,1000,",")) !==FALSE){
                
                $addData = materialEntry::insert([
                    'mat_id'        => $data[0],
                    'mat_name'      => $data[1],
                    'material'      => $data[2],
                    'material_desc' => $data[3],
                    'matl_group'    => $data[4],
                    'gross'         => $data[5],
                    'tare'          => $data[6],
                    'netweight'     => $data[7],
                    'init_qty'      => $data[8],
                    'uom'           => $data[9],
                    'vehicleno'     => $data[10],
                    'mat_loc'       => $data[11],
                    'quantity'      => $data[12],
                    'stock_alert'   => $data[13],
                    'store'         => $data[14],
                    'mat_crtd_dt'   => $data[15]
                ]);
            }
            
        }
        return redirect()
                    ->back()
                    ->withErrors('Exl file imported successfully');
    }*/
    //-------------------------------------------------------------------------

    /**
    * It will display blade file for import xls or csv
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function list(){
        //$products = Product::get();
        return view('importCsv');
    }
    //-------------------------------------------------------------------------

    /**
    * It will import only CSV, XLS and XLSX file
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function productsImport(Request $request){
        ini_set('max_execution_time', 600);
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = \Excel::load($path)->get();
            for ($i=0; $i <$data->count() ; $i++) { 
                 $data[$i]['date'] = date('d-m-Y');
            }
           
            //print_r($data); die('date');
            if($data->count()){
 
                foreach ($data as $key => $value) {
                    
                    $product_list[] = [
                                        'mat_id'           => $value->material_id,   
                                        'mat_name'         => $value->materialname, 
                                        'material'         => $value->material,
                                        'material_desc'    => $value->material_desc,
                                        'matl_group'       => $value->material_group,
                                        'gross'            => $value->gross,
                                        'tare'             => $value->tare,
                                        'netweight'        => $value->netweight,
                                        'init_qty'         => $value->initial_quantity,
                                        'uom'              => $value->uom,
                                        'vehicleno'        => $value->vehicle_no,
                                        'mat_loc'          => $value->material_location,
                                        'quantity'         => $value->quantity,
                                        'receive_quantity' => $value->quantity,
                                        'stock_alert'      => $value->alert_quantity,
                                        'store'            => $value->store,
                                        'mat_crtd_dt'      => $value->create_date
                                      ];
                }  

                $dbData = IssueDetail::select('material_id')
                                        ->get();

                $dbArray=[];

                foreach ($dbData as $key => $value) {

                    $dbArray[$key] = $value->material_id;
                }

                if(!empty($product_list)){

                    $duplicateIdArray = [];

                    $emptyIdArray = [];

                    foreach ($product_list as $pkey => $pvalue) {

                        $materialArray = [
                                            'material_id'          => $pvalue['mat_id'],
                                            'material_name'        => $pvalue['mat_name'], 
                                            'material'             => $pvalue['material'],
                                            'material_description' => $pvalue['material_desc'],
                                            'material_group'       => $pvalue['matl_group'],
                                            'material_gross'       => $pvalue['gross'],
                                            'material_tare'        => $pvalue['tare'],
                                            'material_netweight'   => $pvalue['netweight'],
                                            'material_location'    => $pvalue['mat_loc']
                                          ];
                        $issueArray = [
                                        'material_id'   => $pvalue['mat_id'],  
                                        'material_date' => $pvalue['mat_crtd_dt'], 
                                        'issue_place'   => $pvalue['store'],
                                        'uom'           => $pvalue['uom'],
                                        'stock'         => $pvalue['quantity'],
                                        'vehhicle_no'   => $pvalue['vehicleno'],
                                        'alert_Quantity'=> $pvalue['stock_alert'],
                                        'add_quantity'  => $pvalue['quantity'],
                                        'type'          => 'Add'
                                      ];

                        //print_r($issueArray);die('parray');

                        if ($pvalue['mat_id'] == "" || $pvalue['mat_name'] == "") {
                            array_push($emptyIdArray, $pvalue);
                            Session::flash('alert-warning', 'Empty id and name found');
                            
                        }
                        
                        elseif(in_array($pvalue['mat_id'], $dbArray)){

                            $qtyData = IssueDetail::select('stock')
                                                    ->where('material_id', '=', $pvalue['mat_id'])
                                                    ->where('issue_place', '=', 'CentralStore')
                                                    ->orderBy('id', 'DESC')
                                                    ->first();
                            
                            $total = $qtyData['stock'] + $pvalue['quantity'];

                         // print_r($total);die('ok');

                            $queryData = [
                                        'material_id'   => $pvalue['mat_id'],  
                                        'material_date' => $pvalue['mat_crtd_dt'], 
                                        'issue_place'   => $pvalue['store'],
                                        'uom'           => $pvalue['uom'],
                                        'stock'         => $total,
                                        'vehhicle_no'   => $pvalue['vehicleno'],
                                        'alert_Quantity'=> $pvalue['stock_alert'],
                                        'add_quantity'  => $pvalue['quantity'],
                                        'type'          => 'update'
                                      ];
                            
                            $exldata = IssueDetail::create($queryData);
                            Session::flash('alert-success', 'File improted update successfully.');

                        }

                        else{
                            //print_r($materialArray);print_r($issueArray);die('parqqqqray');
                            $MaterialDetail = MaterialDetail::create($materialArray);
                            $IssueDetail = IssueDetail::create($issueArray);
                            Session::flash('alert-success', 'File improted successfully.');
                        }
                        
                    }
                }
            }
        }else{
            return 'There is no file to import';
        }
         return Redirect('importCsv');
    } 
    //------------------------------------------------------------------------- 

    /**
    * It will get data from db to edit
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function centralStoreEdit($centralId){

        $centralStoreId = $centralId;

        $centralData = MaterialDetail::join('issue_details', 'material_details.material_id', '=',                             'issue_details.material_id')
                                    ->where('issue_details.id', $centralStoreId)
                                    ->get();
        
        return view('centralStoreEdit')->with('centralDatas', $centralData);
    }
    //-------------------------------------------------------------------------

    /**
    * It will update central store data
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function centralStoreUpdate(Request $request){

        $storeUpdate = $request->all();
        
        //print_r($storeUpdate); die('up');

        $addedStock = IssueDetail::where('id', $storeUpdate['CentralId'])
                                    ->update([
                                              'material_date'        => $storeUpdate['material_date'],
                                              'uom'                  => $storeUpdate['uom'],
                                              'vehicle_no'           => $storeUpdate['vehicle_number'],
                                              'issue_place'          => $storeUpdate['issue_place'],
                                              'add_quantity'         => $storeUpdate['init_qty'],
                                              'stock'                => $storeUpdate['stock'],
                                              'alert_Quantity'       => $storeUpdate['alert_Quantity'],
                                              'type'                 => 'Add'
                                            ]);

        $updateMaterialId = MaterialDetail::where('material_id', $storeUpdate['material_id'])
                                         ->update([
                                                    'material_description' => $storeUpdate['material_description'],
                                                    'material_netweight'   => $storeUpdate['material_netweight'],
                                                    'material_location'    => $storeUpdate['material_location'],
                                                    'material_group'       => $storeUpdate['material_group'],
                                                    'material_tare'        => $storeUpdate['material_tare'],
                                                    'material_gross'       => $storeUpdate['material_gross'],
                                                    'material'             => $storeUpdate['material']
                                                 ]);
       
        return redirect()
                    ->back()
                    ->withErrors('Central store update successfully');
    }
    //-------------------------------------------------------------------------

    /**
    * It will display exl/csv file for issue 
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function issueImport(){

        return view('issueImport');
    }
    //-------------------------------------------------------------------------

    /**
    * It will import exl/csv file for issue 
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
    public function getIssueImport(Request $request){

        ini_set('max_execution_time', 600);

        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = \Excel::load($path)->get();

            for ($i=0; $i <$data->count() ; $i++) { 

                 $data[$i]['date'] = date('d-m-Y');
            }
            
            if($data->count()){
 
                foreach ($data as $key => $value) {
                    
                    $issue_list[] = [
                                        'mat_id'        => $value->material_id, //excel file name
                                        'mat_name'      => $value->material_name, 
                                        'uom'           => $value->uom,
                                        'quantity'      => $value->quantity,
                                        'villano'       => $value->villa_no,
                                        'store'         => $value->issue_place,
                                        'mat_crtd_dt'   => $value->issue_date,
                                        'alert_quantity'=> $value->alert_quantity
                                      ];
                }
                
                $issueDetailData = IssueDetail::select('material_id')
                                        ->get();
                $issueArray=[];

                foreach ($issueDetailData as $key => $value) {

                    $issueArray[$key] = $value->material_id;
                }

                if(!empty($issue_list)){

                    foreach ($issue_list as $pkey => $pvalue) {
                        
                        if ($pvalue['mat_id'] == "" || $pvalue['mat_name'] == "") {
                            
                            Session::flash('alert-warning', 'Empty id and name found');
                            
                        }
                        
                        elseif(in_array($pvalue['mat_id'], $issueArray)){

                            $issueQtyData = IssueDetail::select('stock' , 'id')
                                                    ->where('material_id', '=', $pvalue['mat_id'])
                                                    ->where('issue_place', '=', 'CentralStore')
                                                    ->orderBy('id', 'DESC')
                                                    ->first();

                            if($issueQtyData['stock'] >= $pvalue['quantity']){

                                $issueTotal = $issueQtyData['stock'] - $pvalue['quantity'];

                                $issueUpdateData = IssueDetail::where('id', '=', $issueQtyData['id'])
                                                               ->update(['stock' => $issueTotal]);

                                $issueQueryData = [
                                                    'material_id'       => $pvalue['mat_id'],  
                                                    'material_date'     => $pvalue['mat_crtd_dt'], 
                                                    'issue_place'       => $pvalue['store'],
                                                    'uom'               => $pvalue['uom'],
                                                    'stock'             => $issueTotal,
                                                    'villa_number'      => $pvalue['villano'],
                                                    'subtract_quantity' => $pvalue['quantity'],
                                                    'alert_Quantity'    => $pvalue['alert_quantity'],
                                                    'type'              => 'sub'
                                                  ];

                                $issueExlData = IssueDetail::create($issueQueryData);

                                $issueSubStoreQtyData = SubStore::select('stock' , 'id')
                                                    ->where('material_id', '=', $pvalue['mat_id'])
                                                    ->where('issue_place', '=', 'SubStore')
                                                    ->orderBy('id', 'DESC')
                                                    ->first();

                                $addSubStore =$issueSubStoreQtyData['stock'] + $pvalue['quantity'];

                                if($pvalue['store'] != 'Villa'){

                                    $issueSubStoreQueryData = [
                                                    'material_id'       => $pvalue['mat_id'],  
                                                    'material_date'     => $pvalue['mat_crtd_dt'], 
                                                    'issue_place'       => $pvalue['store'],
                                                    'uom'               => $pvalue['uom'],
                                                    'stock'             => $addSubStore,
                                                    'alert_Quantity'    => $pvalue['alert_quantity'],
                                                    'type'              => 'add',
                                                    'add_quantity'      => $pvalue['quantity']
                                                  ];
                                    
                                    $issueSubStoreExlData = SubStore::create($issueSubStoreQueryData);
                                }

                                Session::flash('alert-success', 'File improted update successfully.');
                            }
                            else{
                                Session::flash('alert-warning', 'Insufficient stock.');
                            }
                        }
                        else{
                            
                            Session::flash('alert-warning', 'File is not found.');
                        }
                    }
                }
            }
        }else{
            return 'There is no file to import';
        }
        return Redirect('issueImport');
    }
    //-------------------------------------------------------------------------
}

/**
    * End class
    *
    * @access public
    * @param  Illuminate\Http\Request $request
    * @return Response
    * @since 1.0.0
    * @version 1.0.0
    * @author Nprodax Technologies Pvt. Ltd. <>
    *
    */
