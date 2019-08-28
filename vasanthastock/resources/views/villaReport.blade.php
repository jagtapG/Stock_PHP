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
                    <h1 class="title">Added Stock Report</h1>                            </div>

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
                    <h2 style="text-align: center;font-size:23px;">Villa Report</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">
                    <form method="post" action="{{url('villadatesearch')}}">
                        {{csrf_field()}}
                        <div class="text-center col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Issue Date From :</label>
                                    <input type="date" name="fromdate" id="fromdate" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Issue Date To :</label>
                                    <input type="date" name="todate" id="todate" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div></div>
                                    <input type="submit" name="search" id="search" class="btn btn-info" value="Search" style="margin-top: 28px;">
                                </div>
                            </div>
                        </div>   
                    </form>  
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Issue Date</th>
                                        <th>Material Name</th>
                                        <th>UOM</th>
                                        <th>Material</th>
                                        <th>Material Group</th>
                                        <th>Quantity</th>
                                        <th>Place</th>
                                        <th>Villa No</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td>Issue Date</td>
                                        <td>Material Name</td>
                                        <td>UOM</td>
                                        <td>Material</td>
                                        <td>Material Group</td>
                                        <td>Quantity</td>
                                        <td>Place</td>
                                        <td>Villa No</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($villaReports as $villaReport)
                                    <tr>
                                        <td>{{$villaReport->material_date}}</td>
                                        <td>{{$villaReport->material_name}}</td>
                                        <td>{{$villaReport->uom}}</td>
                                        <td>{{$villaReport->material}}</td>
                                        <td>{{$villaReport->material_group}}</td>
                                        <td>{{$villaReport->subtract_quantity}}</td>
                                        <td>{{$villaReport->issue_place}}</td>
                                        <td>{{$villaReport->villa_number}}</td>
                                    </tr>
                                    @endforeach

                                    @foreach($VillaCentrals as $VillaCentral)
                                    <tr>
                                        <td>{{$VillaCentral->material_date}}</td>
                                        <td>{{$VillaCentral->material_name}}</td>
                                         <td>{{$VillaCentral->uom}}</td>
                                        <td>{{$VillaCentral->material}}</td>
                                        <td>{{$VillaCentral->material_group}}</td>
                                        <td>{{$VillaCentral->subtract_quantity}}</td>
                                        <td>{{$VillaCentral->issue_place}}</td>
                                        <td>{{$VillaCentral->villa_number}}</td>
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


<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each header cell
        $('#example thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        });
     
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
            });
        });
    });
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