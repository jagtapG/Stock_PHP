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
                                <a href="{{url('material')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('save')}}" method="post">
									{{csrf_field()}}
								<div class="col-md-12">
									<div class="col-md-10">
										<div class="form-group">
											<h4 id="msg">{{ implode('', $errors->all(':message')) }}</h4>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Store:</label>
											<select class="form-control" name="plant" id="plant">
												<option value="">Select Store</option>
												<option value="CentralStore" selected="selected">Central Store</option>
												<option value="SubStore">Sub Store</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Name:</label>
											<select class="form-control" name="materialName" id="materialName">
												<option value="">Select material Name</option>
												@foreach($matNames as $name)
													<option value="{{$name->material_id}}">{{$name->material_name}}</option>
												@endforeach
											</select>
										</div>
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
$("#material").on("change",function(){
	if ($("#material").val() == "newMaterial") {
		$(".newMaterial").attr('readonly', false);
	}else if ($("#material").val() == "oldMaterial") {
		$(".newMaterial").attr('readonly', true);
	}
})	
</script>

<script type="text/javascript">
	$('#plant').on('change', function() {
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