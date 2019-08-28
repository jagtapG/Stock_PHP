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
                    <h1 class="title">Plant Entry</h1> 
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
                    <h2 style="text-align: center;font-size:23px;">Plant Entry</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('insert')}}" method="post">
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
											<label>Plant id:</label>
											<input type="text" class="form-control" name="plant_id" id="plant_id" placeholder=" Example=1004">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Plant Description:</label>
											<input type="text" class="form-control" name="plant_desc" id="plant_desc">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Plant Code: </label>
											<input type="text" class="form-control" name="plant_code" id="plant_code" placeholder=" Example=hyd">
										</div>
									</div>
									
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Address: </label>
											<input type="text" class="form-control" name="plant_address" id="plant_address">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact: </label>
											<input type="text" class="form-control" name="plant_contact" id="plant_contact">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Chief Email: </label>
											<input type="text" class="form-control" name="chief_email" id="chief_email">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>State:</label>
											<input type="text" class="form-control" name="plant_state" id="plant_state">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Pincode:</label>
											<input type="text" class="form-control" name="plant_pincode" id="plant_pincode">
										</div>
									</div>
									
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Name1:</label>
											<input type="text" class="form-control" name="contactName1" id="contactName1">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Phone1:</label>
											<input type="text" class="form-control" name="contactPhone1" id="contactPhone1">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Email1:</label>
											<input type="text" class="form-control" name="contactEmail1" id="contactEmail1">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Name2:</label>
											<input type="text" class="form-control" name="contactName2" id="contactName2">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Phone2:</label>
											<input type="text" class="form-control" name="contactPhone2" id="contactPhone2">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Contact Email2:</label>
											<input type="text" class="form-control" name="contactEmail2" id="contactEmail2">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="text-center">
										<button class="btn btn-success" id="submit" name="submit">Save</button>
										<button class="btn btn-danger" id="cancel" name="cancel">Cancel</button>
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
