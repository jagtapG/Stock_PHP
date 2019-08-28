@include('master')
@include('navbar-header')
@include('navbar-sidemenu')
<style type="text/css">
    section.box {
        background-color: #ffffff;
        margin: 4px -10px;
    }
    .select2-container--default .select2-selection--single {
	    background-color: #fff;
	    border: 1px solid #e1e1e1;
	    border-radius: 0px;
	}
</style>
<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

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
                    <h2 style="text-align: center;font-size:23px;">Update Centra Store </h2>
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
                                <a href="{{url('materialreport')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('centralStoreUpdate')}}" method="post" name="vform" onsubmit="return(FormValidate());">
								{{csrf_field()}}
								<div class="col-md-12">
									<div class="col-md-10">
										<div class="form-group">
											<h4 id="msg" style="color: green;">{{ implode('', $errors->all(':message')) }}</h4>
										</div>
									</div>
								</div>



								@foreach($centralDatas as $centralData)

								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">

											<input type="hidden" name="CentralId" id="CentralId" value="{{$centralData->id}}">

											<label>Material id</label>
											<input type="text" class="form-control newMaterial" name="material_id" id="material_id" value="{{$centralData->material_id}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Name</label>
											<input type="text" class="form-control newMaterial" name="material_name" id="material_name" value="{{$centralData->material_name}}"" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material</label>
											<input type="text" class="form-control" name="material" id="material" value="{{$centralData->material}}"">
										</div>
									</div>
								</div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Description</label>
											<input type="text" class="form-control newMaterial" name="material_description" id="material_description" value="{{$centralData->material_description}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Create Date</label>
											<input type="text" class="form-control newMaterial" name="material_date" id="material_date" value="{{$centralData->material_date}}">
										</div>
									</div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Group</label>
                                            <input type="text" class="form-control newMaterial" name="material_group" id="material_group" value="{{$centralData->material_group}}">
                                        </div>
                                    </div>
									
								</div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Gross</label>
											<input type="text" class="form-control newMaterial" step="0.01" name="material_gross" id="material_gross" value="{{$centralData->material_gross}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Tare</label>
											<input type="text" class="form-control newMaterial" name="material_tare" id="material_tare" oninput="Validate()" value="{{$centralData->material_tare}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Net Weight</label>
											<input type="text" class="form-control newMaterial" name="material_netweight" id="material_netweight" readonly="readonly" value="{{$centralData->material_netweight}}"">
										</div>
									</div>
								</div>
                                <div class="col-md-12 newMaterial">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>UOM</label>
                                            <input type="text" class="form-control" name="uom" id="uom" value="{{$centralData->uom}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vehicle No</label>
                                            <input type="text" class="form-control newMaterial" name="vehicle_number" id="vehicle_number" value="{{$centralData->vehicle_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Location</label>
                                            <input type="text" class="form-control newMaterial" name="material_location" id="material_location" placeholder="ex:-Rack No-1" value="{{$centralData->material_location}}">
                                        </div>
                                    </div>
                                    <input type="hidden" name="init_qty" id="init_qty" value="{{$centralData->init_qty}}">
                                </div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Current Quantity</label>
											<input type="text" class="form-control newMaterial" name="stock" id="stock" value="{{$centralData->stock}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Input Quantity Alert Value</label>
											<input type="text" class="form-control newMaterial" name="alert_Quantity" id="alert_Quantity" value="{{$centralData->alert_Quantity}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Store</label>
											<input type="text" class="form-control newMaterial" name="issue_place" id="issue_place" value="{{$centralData->issue_place}}" readonly="readonly">
										</div>
									</div>
								</div>
								@endforeach	
								<div class="col-md-12 newMaterial">
									<div class="text-center">
										<button class="btn btn-success newMaterial" id="submit" name="submit">Update</button>
										<input type="reset" value="Reset" class="btn btn-warning" id="reset" name="reset" >
									</div>
								</div>
							</form>
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
	/*function FormValidate(){
		var code = document.forms['vform']['material'].value;
	    

		if(document.vform.mat_id.value == "" || document.vform.mat_name.value == "" || document.vform.material.value == "" || document.vform.material_desc.value == "" || document.vform.mat_crtd_dt.value == "" || document.vform.matl_group.value == "" || document.vform.gross.value == "" || document.vform.tare.value == "" || document.vform.netweight.value == "" || document.vform.uom.value == "" || document.vform.vehicleno.value == "" || document.vform.mat_loc.value == "" || document.vform.quantity.value == "" || document.vform.stock_alert.value == "" || document.vform.store.value == "")
		{
			swal({
		      	title:"All fields are required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.mat_name.value == "")
		{
			swal({
		      	title:"Material name is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.material.value == "")
		{
			swal({
		      	title:"Material barcode is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.material_desc.value == "")
		{
			swal({
		      	title:"Material description is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.mat_crtd_dt.value == "")
		{
			swal({
		      	title:"Material date is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.matl_group.value == "")
		{
			swal({
		      	title:"Material group is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.gross.value == "")
		{
			swal({
		      	title:"Material gross is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.tare.value == "")
		{
			swal({
		      	title:"Material tare is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.uom.value == "")
		{
			swal({
		      	title:"Material uom is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.vehicleno.value == "")
		{
			swal({
		      	title:"Material vehicle no is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.mat_loc.value == "")
		{
			swal({
		      	title:"Material location no is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.quantity.value == "")
		{
			swal({
		      	title:"Material quantity no is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.stock_alert.value == "")
		{
			swal({
		      	title:"Material quantity alert is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.vform.store.value == "")
		{
			swal({
		      	title:"Material store is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}*/
	}
</script>
<!--/from validation script-->

<script>
function Validate(){
	//alert('hi')
    var gross = parseFloat(document.forms['vform']['material_gross'].value);
    var tare = parseFloat(document.forms['vform']['material_tare'].value);
    var stock = parseFloat(document.forms['vform']['stock'].value);
    //alert(stock);
    var g = gross.toFixed(3);
    var t = tare.toFixed(3);
    var s = stock.toFixed(3);
    var netweight = g-t;
    var n = netweight.toFixed(3);
    var addition = parseInt(n)+parseInt(s);
    var addstock = addition.toFixed(3);
    //alert(addstock);
    document.getElementById('material_netweight').value = n;
    document.getElementById('stock').value = addstock;
    document.getElementById('init_qty').value = n;
    //alert(netweight);
}
</script>

<!--It accept only 3no after decimal point-->
<script type="text/javascript">
	$(function() {
	  $('#material_gross').on('input', function() {
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
	  $('#material_tare').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')            
	      .replace(/(^[\d]{5})[\d]/g, '$1')   
	      .replace(/(\..*)\./g, '$1')         
	      .replace(/(\.[\d]{3})./g, '$1');    
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

<script>
    $( document ).ready(function() {
		$('#material_description').attr('maxlength', 35);
        $('#material_description').bind('keydown', function(event) {
		  var key = event.which;
		  if (key >=48 && key <= 57) {
			event.preventDefault();
		  }
		});
    });
</script>

<script>
    $( document ).ready(function() {
		$('#material_group').attr('maxlength', 35);
        $('#material_group').bind('keydown', function(event) {
		  var key = event.which;
		  if (key >=48 && key <= 57) {
			event.preventDefault();
		  }
		});
    });
</script>

<script>
    $( document ).ready(function() {
		$('#uom').attr('maxlength', 35);
        $('#uom').bind('keydown', function(event) {
		  var key = event.which;
		  if (key >=48 && key <= 57) {
			event.preventDefault();
		  }
		});
    });
</script>

<script>
	$(document).ready(function myfunction() {
	    $("#material_location").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9\- ]+$");
	        var textLength = $("#material_location").val().length + 1;
	        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
	        if (textLength <= 11) {                
	            if (!regex.test(key)) {
	                event.preventDefault();
	                return false;
	            }
	        } else {
	            return false;
	        }

	    });
	});
</script>

<script>
	$(document).ready(function myfunction() {
	    $("#vehicle_number").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
	        var textLength = $("#vehicle_number").val().length + 1;
	        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
	        if (textLength <= 13) {                
	            if (!regex.test(key)) {
	                event.preventDefault();
	                return false;
	            }
	        } else {
	            return false;
	        }

	    });
	});
</script>
<!--/It accept only 3no after decimal point-->

<!--Select2 script-->
<script type="text/javascript">
	$(document).ready(function() {
	    $('.js-example-basic-multiple').select2();
	});
</script>

<!--SELECT 2 CDN-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>