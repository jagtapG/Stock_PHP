
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
	<caption><h3>Add Quantity Report</h3></caption>
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
</table><br>


<table border="1">
	<caption><h3>Issue Quantity Report</h3></caption>
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
</table><br>
</body>
</html>

