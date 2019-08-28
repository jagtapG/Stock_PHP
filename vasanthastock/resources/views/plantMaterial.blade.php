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
        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 style="text-align: center;font-size:23px;">Usages Material Report</h2>
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
                                <a href="{{url('usages')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Material Create Date</th>
                                        <th>Material Id</th>
                                        <th>Material Name</th>
                                        <th>Uom</th>
                                        <th>Material</th>
                                        <th>Material Description</th>
                                        <th>material Group</th>
                                        <th>Quantity</th>
                                        <th>Quantity Alert</th>
                                        <th>Store</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td>Action</td>
                                        <td>Material Create Date</td>
                                        <td>Material Id</td>
                                        <td>Material Name</td>
                                        <td>Uom</td>
                                        <td>Material</td>
                                        <td>Material Description</td>
                                        <td>material Group</td>
                                        <td>Current Quantity</td>
                                        <td>Quantity Alert</td>
                                        <td>Store</td>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($plantData as $plant)
                                    <tr>
                                        <td><a href='{{url("useMaterial/{$plant->material_id}")}}' class="btn btn-primary">Process</a></td>
                                        <td>{{$plant->material_date}}</td>
                                        <td>{{$plant->material_id}}</td>
                                        <td>{{$plant->material_name}}</td>
                                        <td>{{$plant->uom}}</td>
                                        <td>{{$plant->material}}</td>
                                        <td>{{$plant->material_description}}</td>
                                        <td>{{$plant->material_group}}</td>
                                        <td>{{$plant->stock}}</td>
                                        <td>{{$plant->alert_Quantity}}</td>
                                        <td>{{$plant->issue_place}}</td>
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
    
    $('#example thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    
    $('#example').DataTable( {
        "scrollX": true,
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script> -->

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










