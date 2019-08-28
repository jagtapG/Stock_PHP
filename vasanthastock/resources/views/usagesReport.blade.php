<head>
    <title>Usages Report</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--Data Table cdn-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></script>
	<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<!--/Data Table cdn-->
</head>

<div class="container">
	<h1 class="text-center">Usages Report</h1>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>mat_id</th>
                <th>Material Name</th>
                <th>Material</th>
                <th>Material Description</th>
                <th>Material Create Date</th>
                <th>material Type</th>
                <th>material Group</th>
                <th>Old Material</th>
                <th>Plant Id</th>
                <th>Average Price</th>
                <th>Stock</th>
                <th>Plant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getData as $data)
            <tr>
                <td>{{$data->mat_id}}</td>
                <td>{{$data->mat_name}}</td>
                <td>{{$data->material}}</td>
                <td>{{$data->material_desc}}</td>
                <td>{{$data->mat_crtd_dt}}</td>
                <td>{{$data->mtype}}</td>
                <td>{{$data->matl_group}}</td>
                <td>{{$data->old_material}}</td>
                <td>{{$data->plant_id}}</td>
                <td>{{$data->Mov_avg_price}}</td>
                <td>{{$data->stock}}</td>
                <td>{{$data->plant}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group">
                <label>Material Use Date: </label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Material Use Quantity: </label>
                <input type="text" class="form-control" name="qty" id="qty">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="text-center">
            <button class="btn btn-primary" id="submit" name="submit">Update</button>
            <button class="btn btn-danger" id="cancel" name="cancel">Cancel</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>