<!DOCTYPE html>
<html>
<head>
	<title>Sub Store Alert Info</title>
</head>
<body>
<table border="1">
	<caption><h3>Details Of Sub Store Material</h3></caption>
    <thead>
        <tr>
            <th>Material Name</th>
            <th>Material</th>
            <th>Material Group</th>
            <th>Place</th>
            <th>UOM</th>
            <th>Issue Quantity</th>
            <th>Alert Quantity</th>
            <th>Issue Date</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>{{$results->material_name}}</td>
            <td>{{$results->material}}</td>
            <td>{{$results->material_group}}</td>
            <td>{{$results->issue_place}}</td>
            <td>{{$results->uom}}</td>
            <td>{{$results->stock}}</td>
            <td>{{$results->alert_quantity}}</td>
            <td>{{$results->material_date}}</td>
        </tr>
        
    </tbody>
</table>
</body>
</html>