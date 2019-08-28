@include('master')
@include('navbar-header')
@include('navbar-sidemenu')

<head>
	
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
</head>
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
                    <h2 style="text-align: center;font-size:23px;">Material Entry</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('save')}}" method="post" name="vform" onsubmit="return(FormValidate());" autocomplete="off">
								{{csrf_field()}}
								<div class="col-md-12">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))
                                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                                                @endif
                                          @endforeach
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-12">
									<div class="col-md-10">
										<div class="form-group">
											<h4 id="msg" style="color: green;">{{ implode('', $errors->all(':message')) }}</h4>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4 ">
						 				<div class="form-group">
											<label>Existing Or New Material :</label>
											<select class="form-control" name="selmaterial" id="selmaterial" >
												<option value="">Select Material</option>
												<option value="newMaterial" selected="selected">New Material</option>
												<option value="oldMaterial">Existing Material</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 disable">
										<div class="form-group">
											<label>Store:</label>
											<select class="form-control" name="plant" id="plant">
												<option value="">Select Store</option>
												<option value="CentralStore">Central Store</option>
												<option value="SubStore">Sub Store</option>
											</select>
										</div>
									</div>
									<!-- <div class="col-md-4">
										<div class="form-group">
											<label>Initial Quantity:</label>
											<input type="hidden" name="init_qty" id="init_qty" class="form-control">
										</div>
									</div> -->
								</div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material id <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="material_id" id="material_id">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Name <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="material_name" id="material_name" maxlength="100">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control" name="material" id="material">
										</div>
									</div>
								</div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Description <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="material_description" id="material_description" maxlength="100">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Create Date <span style="color: red; font-size: 18px;">*</span></label>
											<input type="date" class="form-control newMaterial" name="material_date" id="material_date">
										</div>
									</div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Group <span style="color: red; font-size: 18px;">*</span></label>
                                            <input type="text" class="form-control newMaterial" name="material_group" id="material_group">
                                        </div>
                                    </div>
									
								</div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Gross <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" step="0.01" name="material_gross" id="material_gross">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Tare <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="material_tare" id="material_tare" oninput="myFunction()">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Net Weight <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="material_netweight" id="material_netweight" readonly="readonly">
										</div>
									</div>
								</div>
                                <div class="col-md-12 newMaterial">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>UOM <span style="color: red; font-size: 18px;">*</span></label>
                                            <select class="form-control js-example-basic-multiple" name="uom" id="uom" >
                                                <option value="">Select UOM</option>
                                                <option value="NOS">NOS</option>
                                                <option value="MT">MT</option>
                                                <option value="KGS">KGS</option>
                                                <option value="PKTS">PKTS</option>
                                                <option value="BOXES">BOXES</option>
                                                <option value="RMT">RMT</option>
                                                <option value="LTRS">LTRS</option>
                                                <option value="M³">M³</option>
                                                <option value="CFT">CFT</option>
                                                <option value="SQM">SQM</option>
                                                <option value="SETS">SETS</option>
                                                <option value="MTS">MTS</option>
                                                <option value="COILS">COILS</option>
                                                <option value="MTRS">MTRS</option>
                                                <option value="SET">SET</option>
                                                <option value="MY">MY</option>
                                                <option value="SQFT">SQFT</option>
                                                <option value="BUNDLES">BUNDLES</option>
                                                <option value="SFT">SFT</option>
                                                <option value="RMY">RMY</option>
                                                <option value="BOX">BOX</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vehicle No <span style="color: red; font-size: 18px;">*</span></label>
                                            <input type="text" class="form-control newMaterial" name="vehicle_no" id="vehicle_no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Location <span style="color: red; font-size: 18px;">*</span></label>
                                            <input type="text" class="form-control newMaterial" name="material_location" id="material_location" placeholder="ex:-Rack No-1">
                                        </div>
                                    </div>
                                    <input type="hidden" name="add_quantity" id="add_quantity" class="form-control">
                                    <input type="hidden" name="current_quantity" id="current_quantity" class="form-control">
                                    <input type="hidden" name="total_quantity" id="total_quantity" class="form-control">
                                </div>
								<div class="col-md-12 newMaterial">
									<div class="col-md-4">
										<div class="form-group">
											<label>Quantity <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="stock" id="stock">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Input Quantity Alert Value <span style="color: red; font-size: 18px;">*</span></label>
											<input type="text" class="form-control newMaterial" name="alert_Quantity" id="alert_Quantity">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Store <span style="color: red; font-size: 18px;">*</span></label>
											<select class="form-control newMaterial" name="issue_place" id="issue_place">
												<option value="">Select Store</option>
												<option value="CentralStore">Central Store</option>
												<option value="SubStore">Sub Store</option>
											</select>
										</div>
									</div>
								</div>
										
								<div class="col-md-12 newMaterial">
									<div class="text-center">
										<button class="btn btn-success newMaterial" id="submit" name="submit">Save</button>
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
	function FormValidate(){
		var code = document.forms['vform']['material'].value;
	    

		if(document.vform.material_id.value == "" || document.vform.material_name.value == "" || document.vform.material.value == "" || document.vform.material_description.value == "" || document.vform.material_date.value == "" || document.vform.material_group.value == "" || document.vform.material_gross.value == "" || document.vform.material_tare.value == "" || document.vform.material_netweight.value == "" || document.vform.uom.value == "" || document.vform.vehicle_no.value == "" || document.vform.material_location.value == "" || document.vform.stock.value == "" || document.vform.alert_Quantity.value == "" || document.vform.issue_palce.value == "")
		{
			swal({
		      	title:"All fields are required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		/*if(document.vform.mat_name.value == "")
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



<script type="text/javascript">
	$('#plant').on('change', function() {
	  //alert( this.value );
	  var val = this.value;
	  //alert(val);
	  window.location.href = "{{url('selectPlant')}}/"+val;
	})
</script>

<script type="text/javascript">
	$(".disable").hide();
	$('#selmaterial').on('change', function () {
   var valueSelected = this.value;
   if(valueSelected == 'newMaterial'){
       $(".disable").hide();
   } 
   else{
   	$(".disable").show();
   }
});
</script>

<script type="text/javascript">
	$('#selmaterial').on('change', function () {
   var value = this.value;
   if(value == 'oldMaterial'){
       $(".newMaterial").hide();
   } else {
       $(".newMaterial").show();
   }
});
</script>

<script>
function myFunction(){
    var gross = parseFloat(document.forms['vform']['material_gross'].value);
    var tare = parseFloat(document.forms['vform']['material_tare'].value);
    //alert(gross);
    var g = gross.toFixed(3);
    var t = tare.toFixed(3);
    var netweight = g-t;
    var n = netweight.toFixed(3);
    document.getElementById('material_netweight').value = n;
    document.getElementById('stock').value = n;
    document.getElementById('add_quantity').value = n;
    document.getElementById('current_quantity').value = n;
    document.getElementById('total_quantity').value = n;
    //alert(netweight);
}
</script>

<!--It accept only 3no after decimal point-->
<script type="text/javascript">
	$(function() {
	  $('#material_gross').on('input', function() {
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
	  $('#material_tare').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')            
	      .replace(/(^[\d]{5})[\d]/g, '$1')   
	      .replace(/(\..*)\./g, '$1')         
	      .replace(/(\.[\d]{3})./g, '$1');    
	  });
	});
</script>

<!-- <script type="text/javascript">
	$(function() {
	  $('#mat_id').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')            
	      .replace(/(^[\d]{4})[\d]/g, '$1')   
	      .replace(/(\ *)\./g, '$1')         
	      .replace(/(\.[\d]{0})./g, '$1');    
	  });
	});
</script> -->

<script>
	$(document).ready(function myfunction() {
	    $("#material_id").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
	        var textLength = $("#material_id").val().length + 1;
	        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
	        if (textLength <= 20) {                
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

<!-- <script type="text/javascript">
	$(function() {
	  $('#material').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')            
	      .replace(/(^[\d]{10})[\d]/g, '$1')   
	      .replace(/(\ *)\./g, '$1')         
	      .replace(/(\.[\d]{0})./g, '$1');    
	  });
	});
</script> -->

<script>
	$(document).ready(function myfunction() {
	    $("#material").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
	        var textLength = $("#material").val().length + 1;
	        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
	        if (textLength <= 20) {                
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
	  $('#stock').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')            
	      .replace(/(^[\d]{5})[\d]/g, '$1')   
	      .replace(/(\ *)\./g, '$1')         
	      .replace(/(\.[\d]{0})./g, '$1');    
	  });
	});
</script>


<!--<script>
    $( document ).ready(function() {
		$('#material_name').attr('maxlength', 35);
        $('#material_name').bind('keydown', function(event) {
		  var key = event.which;
		  if (key >=48 && key <= 57) {
			event.preventDefault();
		  }
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
</script> -->

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
	$(document).ready(function myfunction() {
	    $("#material_location").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9\- ]+$");
	        var textLength = $("#mat_loc").val().length + 1;
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
	    $("#vehicle_no").keypress(function myfunction(event) {
	        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
	        var textLength = $("#vehicleno").val().length + 1;
	        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
	        if (textLength <= 25) {                
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