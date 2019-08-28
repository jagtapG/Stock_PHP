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
</style>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-left">
                    <h1 class="title">Material Report</h1>                            </div>

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
                    <h2 style="text-align: center;font-size:23px;">Add Quantity Report</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                            	<!-- <caption><h3> Central Store Material In Details</h3></caption> -->
                                <thead>
                                    <tr>
                                        <th>Material In Date</th>
										<th>Material Id</th>
										<th>Material Name</th>
                                        <th>Material UOM</th>
										<th>Material</th>
										<th>Material Description</th>
										<th>Material Group</th>
										<th>Added Quantity</th>
										<th>Current Quantity</th>
									</tr>
                                </thead>
                                <tbody>
                                    @foreach($dailyDatas as $dailyData)
									<tr>
                                        <td>{{$dailyData->material_date}}</td>
										<td>{{$dailyData->material_id}}</td>
										<td>{{$dailyData->material_name}}</td>
                                        <td>{{$dailyData->uom}}</td>
										<td>{{$dailyData->material}}</td>
										<td>{{$dailyData->material_description}}</td>
										<td>{{$dailyData->material_group}}</td>
										<td>{{$dailyData->add_quantity}}</td>
										<td>{{$dailyData->stock}}</td>
									</tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
         <div class="col-lg-12">
		    <section class="box ">
		        <header class="panel_header">
		            <h2 style="text-align: center;font-size:23px;">Issue Quantity Report</h2>
		            <!-- <div class="actions panel_actions pull-right">
		                <i class="box_toggle fa fa-chevron-down"></i>
		                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
		                <i class="box_close fa fa-times"></i>
		            </div> -->
		        </header>
		        <div class="content-body">    
		            <div class="row">
		                <div class="col-md-12 col-sm-12 col-xs-12">
		                    <table id="example2" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
		                        <thead>
		                            <tr>
                                        <th>Material Issue Date</th>
		                                <th>Material Id</th>
										<th>Material Name</th>
                                        <th>UOM</th>
										<th>Material</th>
										<th>Material Description</th>
										<th>Material Group</th>
										<th>Issue Place</th>
										<th>Villa No</th>
										<th>Issue Quantity</th>
		                            </tr>
		                        </thead>
		                        <tbody>
                                    @foreach($dailyIssueDatas as $dailyIssueData)
		                           <tr>
                                        <td>{{$dailyIssueData->material_date}}</td>     
                                        <td>{{$dailyIssueData->material_id}}</td>
                                        <td>{{$dailyIssueData->material_name}}</td>
                                        <td>{{$dailyIssueData->uom}}</td>
                                        <td>{{$dailyIssueData->material}}</td>
                                        <td>{{$dailyIssueData->material_description}}</td>
                                        <td>{{$dailyIssueData->material_group}}</td>
                                        <td>{{$dailyIssueData->issue_place}}</td>
                                        <td>{{$dailyIssueData->villa_number}}</td>
                                        <td>{{$dailyIssueData->subtract_quantity}}</td> 
                                   </tr>
                                   @endforeach
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </section>
		</div>
    </section>
</section>
<!-- END CONTENT -->



<!-- <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 

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



<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example2 thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example2').DataTable(
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->