@include('master')
@include('navbar-header')
@include('navbar-sidemenu')

<style type="text/css">
    table,th,td
    {
        font-size: 11px;
    }
    section.box {
        background-color: #ffffff;
        margin: 4px -10px;
    }
    .select2-container--default .select2-selection--single {
        background-color: white;
        border: 1px solid #e1e1e1;
        border-radius: 0px;
        cursor: text;
    }
</style>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-left">
                    <h1 class="title">Material Usages</h1>
                </div>

                <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="tables-basic.html">Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Tables</strong>
                        </li>
                    </ol>
                </div>

            </div>
        </div> -->
        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 style="text-align: center;font-size:23px;">Material Report</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 text-right">
                                <a href="{{url('CentralStoreId/CentralStore')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th>Material Create Date</th>
                                        <th>mat_id</th>
                                        <th>Material Name</th>
                                        <th>Material</th>
                                        <th>Material Description</th>
                                        <th>Material Group</th>
                                        <th>Current Quantity</th>
                                        <th>Quantity Alert</th>
                                        <th>Store</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        <td>{{$matDatas->material_date}}</td>
                                        <td>{{$matDatas->material_id}}</td>
                                        <td>{{$matDatas->material_name}}</td>
                                        <td>{{$matDatas->material}}</td>
                                        <td>{{$matDatas->material_description}}</td>
                                        <td>{{$matDatas->material_group}}</td>
                                        <td>{{$matDatas->stock}}</td>
                                        <td>{{$matDatas->alert_Quantity}}</td>
                                        <td>{{$matDatas->issue_place}}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
   

        <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">Material Entry</h1> 
                </div>
                <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="form-elements.html">Forms</a>
                        </li>
                        <li class="active">
                            <strong>Form Wizard</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div> -->

        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 style="text-align: center;font-size:23px;">Material Issue</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                               @if($matDatas->stock == 0)
                                <div class="container" style="background-color:white; width: 600px">
                                    <form action="#" method="post">
                                        {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Material Use Date</label>
                                                <input type="date" class="form-control newMaterial" name="mat_use_date" id="mat_use_date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Quantity Required: </label>
                                                <input type="text" class="form-control newMaterial" name="qty" id="qty" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Place Of use:</label>
                                                <input type="text" class="form-control newMaterial" name="place_of_use" id="place_of_use" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-left col-md-6">
                                            <button class="btn btn-primary newMaterial" id="submit" name="submit" disabled>Use</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                @else 

                                <input type="hidden" name="initStock" id="initStock" value="{{$matDatas->stock}}">

                                <div class="container" style="background-color:white; width: 100%">
                                    <form action="{{url('useMaterialRecord')}}" method="post" name="matRecord" onsubmit="return(materialRecord());" autocomplete="off">
                                    {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <h4 id="msg" style="color: green;">{{ implode('', $errors->all(':message')) }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="central_store_id" id="central_store_id" value="{{$matDatas->id}}">

                                    <input type="hidden" name="material_id" id="material_id" value="{{$matDatas->material_id}}">

                                    <input type="hidden" name="alert_Quantity" id="alert_Quantity" value="{{$matDatas->alert_Quantity}}">
                                    
                                    <input type="hidden" name="stock" id="stock">

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <p  style="color: red" id="stock_error"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Material Issue Date <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="date" class="form-control newMaterial" name="material_date" id="material_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Quantity Required <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="text" class="form-control newMaterial" name="subtract_quantity" id="subtract_quantity" onchange="myFunction(); myStock()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>UOM <span style="color: red; font-size: 18px;">*</span></label>
                                                <!-- <select class="form-control js-example-basic-multiple" name="sub_uom" id="sub_uom">
                                                    <option value="">Select UOM</option>
                                                    <option value="Meter">Meter</option>
                                                    <option value="Ton">Ton</option>
                                                    <option value="SquareMeter">Square Meter</option>
                                                    <option value="Kilogram">Kilogram</option> 
                                                </select> -->
                                                <input type="text" name="uom" id="uom" value="{{$matDatas->uom}}" class="form-control" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12" id="meter_val">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Input Value In Meter: </label>
                                                <input type="text" class="form-control" name="meter_val" id="meter_val" onchange=" calFunction();">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Total Meter: </label>
                                                <input type="text" class="form-control" name="total_meter" id="total_meter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Issue Meter Value: </label>
                                                <input type="text" class="form-control" name="issue_meter_val" id="issue_meter_val">
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Place Of Issue <span style="color: red; font-size: 18px;">*</span></label>
                                                <select class="form-control" name="issue_place" id="issue_palce">
                                                    <option value="">Select Place</option>
                                                    <option value="SubStore">Sub Store</option>
                                                    <option value="Villa">Villa</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="villa">
                                            <div class="form-group">
                                                <label>Input Villa No <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="text" class="form-control" name="villa_number" id="villa_number" placeholder="example:- 1/2/3">
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="alertQty">
                                            <div class="form-group">
                                                <label>Input Alert Quantity <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="text" class="form-control" name="alert_Quantity" id="alert_Quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-center col-md-12">
                                            <button class="btn btn-success" id="submit" name="submit">Use</button>
                                            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                                </div>
                                @endif

                                <script>
                                    function myFunction() {
                                        
                                        var qty = document.getElementById("subtract_quantity").value;
                                      
                                        var quantity = document.getElementById("initStock").value;
                                      
                                        var sub = quantity-qty
                                       
                                        document.getElementById("stock").value = sub;

                                        qtyno = Number(qty)
                                       
                                        quantityno = Number(quantity)
                                        
                                        
                                        if(qty > quantityno ){
                                            
                                            document.getElementById("stock_error").innerHTML = "Stock is not available";
                                        }   
                                        else{
                                            
                                            document.getElementById("stock_error").innerHTML = "";
                                        }   
                                    }
                            </script>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->

<!--sweet alert cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!--/sweet alert cdn-->

<!--from validation script-->
<script type="text/javascript">
    function materialRecord(){
        if(document.matRecord.material_date.value == "" || document.matRecord.subtract_quantity.value == "" || document.matRecord.issue_palce.value == "")
        {
            swal({
                title:"All fields are required",
                type:"error",
                timer:10000
            });
            return false;
        }
        if(document.matRecord.material_date.value == "")
        {
            swal({
                title:"Material issue date is required",
                type:"error",
                timer:10000
            });
            return false;
        }
        if(document.matRecord.subtract_quantity.value == "")
        {
            swal({
                title:"Issue quantity is required",
                type:"error",
                timer:10000
            });
            return false;
        }
        if(document.matRecord.issue_palce.value == "")
        {
            swal({
                title:"Issue place is required",
                type:"error",
                timer:10000
            });
            return false;
        }
    }
</script>
<!--/from validation script-->



<script type="text/javascript">
    $(function() {
      $('#subtract_quantity').on('input', function() {
        this.value = this.value
          .replace(/[^\d.]/g, '')             // numbers and decimals only        
          .replace(/(^[\d]{7})[\d]/g, '$1')   // not more than 5 digits at the beginning
          .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
          .replace(/(\.[\d]{3})./g, '$1');   // not more than 3 digits after decimal
      });
    });
</script>

<script type="text/javascript">
    $(function() {
      $('#alert_Quantity').on('input', function() {
        this.value = this.value
          .replace(/[^\d.]/g, '')                    
          .replace(/(^[\d]{5})[\d]/g, '$1')   
          .replace(/(\ *)\./g, '$1')         
          .replace(/(\.[\d]{0})./g, '$1');
      });
    });
</script>

<script type="text/javascript">
    $(function() {
      $('#villa_no').on('input', function() {
        this.value = this.value
          .replace(/[^\d.]/g, '')                     
          .replace(/(^[\d]{3})[\d]/g, '$1')   
          .replace(/(\ *)\./g, '$1')         
          .replace(/(\.[\d]{0})./g, '$1');
      });
    });
</script>


<!--Select2-->
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<!--/Select2-->

<script type="text/javascript">
    $('#issue_palce').on('change', function () {
   var valueSelected = this.value;
   if(valueSelected == 'SubStore'){
       $("#villa").hide();
   } 
   else{
    $("#villa").show();
   }
});
</script>

<script type="text/javascript">
    $('#issue_palce').on('change', function () {
   var valueSelected = this.value;
   if(valueSelected == 'Villa'){
       $("#alertQty").hide();
   } 
   else{
    $("#alertQty").show();
   }
});
</script>

<script type="text/javascript">
    $('#sub_uom').on('change', function () {
   var valueSelected2 = this.value;
   //alert(valueSelected);
   if(valueSelected2 == 'Ton' || valueSelected2 == 'SquareMeter' || valueSelected2 == 'Kilogram' ){
        //alert(valueSelected)
       $("#meter_val").hide();
   } 
   else{
    $("#meter_val").show();
   }
});
</script>


<script type="text/javascript">
    function calFunction(){
        var qty_req = document.getElementById("qty").value;
        var meter_val = document.getElementById("meter_val").value;
        // alert(qty_req+meter_val);
        var total_meter = qty_req*meter_val;
        // alert(issue_meter_val);
        document.getElementById("total_meter").value =total_meter; 
    }
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<!-- 
<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable(
        {
        "scrollX": true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

 -->
<!--SELECT 2 CDN-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
