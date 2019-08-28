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
                                <a href="{{url('substore/SubStore')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%" border="1">
                                <thead>
                                    <tr>
                                        <th>Issue Date</th>
                                        <th>Material Name</th>
                                        <th>Material</th>
                                        <th>Material Group</th>
                                        <th>Quantity</th>
                                        <th>Quantity Alert</th>
                                        <th>Issue Place</th>
                                    </tr>
                                </thead>
                                <!-- <thead>
                                    <tr>
                                        <td>Material Name</td>
                                        <td>Material</td>
                                        <td>Material Group</td>
                                        <td>Quantity</td>
                                        <td>Quantity Alert</td>
                                        <td>Issue Place</td>
                                        <td>Issue Date</td>
                                    </tr>
                                </thead> -->
                                <tbody>
                                    
                                    <tr>
                                        <td>{{$subStoreDatas->material_date}}</td>
                                        <td>{{$subStoreDatas->material_name}}</td>
                                        <td>{{$subStoreDatas->material}}</td>
                                        <td>{{$subStoreDatas->material_group}}</td>
                                        <td>{{$subStoreDatas->stock}}</td>
                                        <td>{{$subStoreDatas->alert_quantity}}</td>
                                        <td>{{$subStoreDatas->issue_place}}</td>
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
                    <h2 style="text-align: center;font-size:23px;">Material Issue To Villas</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	
                               @if($subStoreDatas->stock == 0)
                                <div class="container" style="background-color:white; width: 600px">
                                    <form action="{{url('villa')}}" method="post">
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
                                                <input type="text" class="form-control newMaterial" name="qt" id="qt" readonly>
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

                                <div class="container" style="background-color:white; width: 600px">
                                    <form action="{{url('villa')}}" method="post" name="villaRecord" onsubmit="return(villaFunction());">
                                        {{csrf_field()}}

                                    <input type="hidden" name="sub_store_id" id="sub_store_id" value="{{$subStoreDatas->material_id}}">

                                    <div class="col-md-12">
										<div class="col-md-10">
											<div class="form-group">
												<h4 id="msg" style="color: green;">{{ implode('', $errors->all(':message')) }}</h4>
											</div>
										</div>
									</div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Material Issue Date <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="date" class="form-control newMaterial" name="issue_date" id="issue_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Quantity Required <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="text" class="form-control newMaterial" name="qtyv" id="qtyv" onchange="myValidate()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <p id="stock_error" style="color: red"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Input Villa No <span style="color: red; font-size: 18px;">*</span></label>
                                                <input type="text" name="villano" class="form-control" id="villano" placeholder="example:-1/2/3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
									<div class="col-md-8">
										<div class="form-group">
											<label>UOM <span style="color: red; font-size: 18px;">*</span></label>
											<!-- <select class="form-control js-example-basic-multiple" name="uom" id="uom">
												<option value="">Select UOM Name</option>
												<option value="Meter">Meter</option>
												<option value="Ton">Ton</option> 
												<option value="SquareMeter">Square Meter</option>
												<option value="Kilogram">Kilogram</option>
											</select> -->
                                            <input type="text" name="uom" id="uom" value="  {{$subStoreDatas->uom}}" readonly="readonly" class="form-control">
										</div>
									</div>
								</div>
                                    <div class="col-md-12">
                                        <div class="text-center col-md-8">
                                            <button class="btn btn-success newMaterial" id="submit" name="submit">Use</button>
                                            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                                </div>

                                @endif
                                <input type="hidden" name="hid" id="hid" value="{{$subStoreDatas->stock}}">
                                <script>
                                    function myValidate() {
                                        var qtyv = document.getElementById("qtyv").value;
                                        var quantity = document.getElementById("hid").value;

                                        qtyno = Number(qtyv);
                                        quantityno = Number(quantity);

                                        if(qtyno > quantityno ){
                                            document.getElementById("stock_error").innerHTML = "Quantity is not available";
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
    function villaFunction(){
        if(document.villaRecord.qtyv.value == "" || document.villaRecord.villano.value == "" || ument.villaRecord.issue_date.value == "")
        {
            swal({
                title:"All fields are required",
                type:"error",
                timer:10000
            });
            return false;
        }
        if(document.villaRecord.qtyv.value == "")
        {
            swal({
                title:"Quantity is required",
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
      $('#qtyv').on('input', function() {
        this.value = this.value
          .replace(/[^\d.]/g, '')             // numbers and decimals only        
          .replace(/(^[\d]{5})[\d]/g, '$1')   // not more than 5 digits at the beginning
          .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
          .replace(/(\.[\d]{3})./g, '$1');   // not more than 3 digits after decimal
      });
    });
</script>


<script type="text/javascript">
    $(function() {
      $('#villano').on('input', function() {
        this.value = this.value
          .replace(/[^\d.]/g, '')             // numbers and decimals only        
          .replace(/(^[\d]{3})[\d]/g, '$1')   // not more than 5 digits at the beginning
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
<!--/select2-->
<!-- 
<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead th').each( function () {
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
 
        $( 'input', this.header() ).on( 'keyup change', function () {
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