@include('master')
@include('navbar-header')
@include('navbar-sidemenu')
<style type="text/css">
    section.box {
        background-color: #ffffff;
        margin: 4px -10px;
    }
</style>
<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>
        <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-left">
                    <h1 class="title">Update Old Material</h1> 
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
                    <h2 style="text-align: center;font-size:23px;">Update Existing Material</h2>
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
                                <a href="{{url('selectPlant/CentralStore')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('updateMaterial')}}" method="post" name="updateMaterial" onsubmit="return(updateFunction());">
									{{csrf_field()}}
								<div class="col-md-12">
									<div class="col-md-10">
										<div class="form-group">
											<h4 id="msg" style="color: green;">{{ implode('', $errors->all(':message')) }}</h4>
										</div>
									</div>
								</div>
								
								<input type="hidden" name="matid" id="matid" value="{{$nameData->id}}">

								<input type="hidden" name="uom" id='uom' value="{{$nameData->uom}}">

								<input type="hidden" name="alert_Quantity" id='alert_Quantity' value="{{$nameData->alert_Quantity}}">

								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material id:</label>
											<input type="text" class="form-control newMaterial" name="material_id" id="material_id" value="{{$nameData->material_id}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Name:</label>
											<input type="text" class="form-control newMaterial" name="material_name" id="material_name" value="{{$nameData->material_name}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material: </label>
											<input type="text" class="form-control newMaterial" name="material" id="material" value="{{$nameData->material}}" readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Description: </label>
											<input type="text" class="form-control newMaterial" name="material_description" id="material_description" value="{{$nameData->material_description}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Create Date: </label>
											<input type="text" class="form-control newMaterial" name="pmaterial_date" id="pmaterial_date" value="{{$nameData->material_date}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Group:</label>
											<input type="text" class="form-control newMaterial" name="material_group" id="material_group" value="{{$nameData->material_group}}" readonly="readonly">
										</div>
									</div>
									
								</div>
								<!-- <div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Group:</label>
											<input type="text" class="form-control newMaterial" name="matl_group" id="matl_group" value="{{$nameData->matl_group}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Old Material:</label>
											<input type="text" class="form-control newMaterial" name="old_material" id="old_material" value="{{$nameData->old_material}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Plant Id:</label>
											<input type="text" class="form-control" name="plant_id" id="plant_id">
										</div>
									</div>
								</div> -->
								<div class="col-md-12">
									<!-- <div class="col-md-4">
										<div class="form-group">
											<label>Initial Quantity:</label>
											<input type="text" class="form-control" name="prvstock" id="prvstock" value="{{$nameData->init_qty}}" readonly="readonly">
										</div>
									</div> -->
									<div class="col-md-4">
										<div class="form-group">
											<label>Remaining Quantity:</label>
											<input type="text" class="form-control" name="rstock" id="rstock" value="{{$nameData->stock}}" readonly="readonly">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Store:</label>
											<input type="text" class="form-control" name="issue_place" id="issue_place" readonly="readonly" value="{{$nameData->issue_place}}">
										</div>
									</div>
								</div>
								<div class="col-md-12">
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
											<label>Net Weight</label>
											<input type="text" class="form-control newMaterial" name="material_netweight" id="material_netweight" readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Location <span style="color: red; font-size: 18px;">*</span></label>
                                            <input type="text" class="form-control newMaterial" name="material_location" id="material_location" value="{{$nameData->material_location}}">
                                        </div>
                                    </div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Add Quantity</label>
											<input type="text" class="form-control oldMaterial" name="stock" id="stock" value="" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Date <span style="color: red; font-size: 18px;">*</span></label>
											<input type="date" class="form-control" name="material_date" id="material_date" value="">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="text-center">
										<input type="submit" class="btn btn-success" name="submit" value="Add New Stock">
										<input type="reset" class="btn btn-warning" name="submit" value="Reset">
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


<script type="text/javascript">
	$(function() {
	  $('#stock').on('input', function() {
	    this.value = this.value
	      .replace(/[^\d.]/g, '')                   
	      .replace(/(^[\d]{7})[\d]/g, '$1')   
	      .replace(/(\..*)\./g, '$1')         
	      .replace(/(\.[\d]{3})./g, '$1');   
	  });
	});
</script>


<!--sweet alert cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!--/sweet alert cdn-->

<!--from validation script-->
<script type="text/javascript">
	function updateFunction(){
		if(document.updateMaterial.material_location.value == "" || document.updateMaterial.material_date.value == "" || document.updateMaterial.material_gross.value == "" || document.updateMaterial.material_tare.value == "")
		{
			swal({
		      	title:"All Fields are required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		/*if(document.updateMaterial.material_location.value == "")
		{
			swal({
		      	title:"Material location is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.updateMaterial.stock.value == "")
		{
			swal({
		      	title:"New quantity is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}
		if(document.updateMaterial.material_date.value == "")
		{
			swal({
		      	title:"Date is required",
		      	type:"error",
		      	timer:10000
		    });
		    return false;
		}*/
	}
</script>
<!--/from validation script-->

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

<script type="text/javascript">
$("#material").on("change",function(){
	if ($("#material").val() == "newMaterial") {
		$(".newMaterial").attr('readonly', false);
	}else if ($("#material").val() == "oldMaterial") {
		$(".newMaterial").attr('readonly', true);
	}
})	
</script>

<script type="text/javascript">
	$('#issue_place').on('change', function() {
	  //alert( this.value );
	  var val = this.value;
	  //alert(val);
	  window.location.href = "{{url('selectPlant')}}/"+val;
	})
</script>
<script type="text/javascript">
	$('#materialName').on('change', function() {
	  //alert( this.value );
	  var matName = this.value;
	  //alert(matName);
	  window.location.href = "{{url('selectMatName')}}/"+matName;
	})
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

<!--Calculation of gors and tare-->
<script>
function myFunction(){
    var gross = parseFloat(document.forms['updateMaterial']['material_gross'].value);
    var tare = parseFloat(document.forms['updateMaterial']['material_tare'].value);
    //alert(gross);
    var g = gross.toFixed(3);
    var t = tare.toFixed(3);
    var netweight = g-t;
    var n = netweight.toFixed(3);
    document.getElementById('material_netweight').value = n;
    document.getElementById('stock').value = n;
}
</script>