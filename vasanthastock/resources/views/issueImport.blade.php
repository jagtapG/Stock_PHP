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
                    <h2 style="text-align: center;font-size:23px;"> Usages Import CSV File</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div> -->
                </header>
                <div class="content-body">    
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<form action="{{url('issue-import')}}" method="post" enctype="multipart/form-data" name="csvFile" onsubmit=" return csvFunction()" id="modalForm">
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
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label>Choose File(CSV/XLS) :</label>
                                            <input type="file" name="file" class="form-control" id="file">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="submit" name="sub" value="Upload" class="btn btn-success" style="margin-top: 29px;">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Initial Quantity:</label>
                                            <input type="hidden" name="init_qty" id="init_qty" class="form-control">
                                        </div>
                                    </div> -->
                                </div>   
                            </form>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                            <table style="font-size:12px;" border="1"  width="80%" class="table">
                                <caption style="font-size: 20px; text-align: center;">CSV file format</caption>
                                <thead>
                                    <tr>
                                        <th>Material Id</th>
                                        <th>Material Name</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>Issue place</th>
                                        <th>Villa No</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1001</td>
                                        <td>Diesel</td>
                                        <td>LTRS</td>
                                        <td>100</td>
                                        <td>Villa</td>
                                        <td>12</td>
                                        <td>2018/07/03</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div><br><br><br>
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                            <br>
                             <p><stromg style="font-size: 18px;">Note:-</stromg> All fields are required. <b style="color: red;">If you leave any cloumn empty then entire row will be skip</b>.</p>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->


<!--sweet alert cdn-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!--/sweet alert cdn-->

<!-- Sweet alert from validation script-->
<script type="text/javascript">
    function csvFunction(){
        var csv = document.forms['csvFile']['file'].value;
        //alert(csv)

        if(document.csvFile.file.value == "" )
        {
            swal({
                title:"File not selected",
                type:"error",
                timer:10000
            });
            return false;
        }
    }
</script>

<script type="text/javascript">
    $( "#modalForm" ).validate({
         rules: {
               
               file: {
                   
                   extension: "csv|CSV|xls|XLS|xlsx|XLSX"
               },

          },
          messages: {
            file: {
                extension: "Please Upload only csv, xls and xlsx files"
            },
        }
       });
</script>
<!--/Sweet alert from validation script-->

