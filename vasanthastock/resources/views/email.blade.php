<!DOCTYPE html>
<html>
<head>
	<title>SendMail</title>
</head>
<body>
<table border="1">
	<caption><h1>Details Of Material</h1></caption>
    <thead>
        <tr>
            <th>Material Id</th>
            <th>Material Name</th>
            <th>Material</th>
            <th>Material Description</th>
            <th>material Group</th>
            <th>Quantity</th>
            <th>Quantity Alert</th>
            <th>Store</th>
            <th>Material Create Date</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>{{$results->material_id}}</td>
            <td>{{$results->material_name}}</td>
            <td>{{$results->material}}</td>
            <td>{{$results->material_description}}</td>
            <td>{{$results->material_group}}</td>
            <td>{{$results->stock}}</td>
            <td>{{$results->alert_Quantity}}</td>
            <td>{{$results->issue_place}}</td>
            <td>{{$results->material_date}}</td>
        </tr>
        
    </tbody>
</table>
</body>
</html>