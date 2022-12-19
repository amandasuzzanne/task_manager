<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="sidenav">
    <a href="/" style="color: white; margin-top: 35px;">HOME</a>
    <a href="/manage_tasks" style="margin-top: 35px;">MANAGE TASK</a>
    <a href="/calendar" style="margin-top: 35px;">EVENT CALENDAR</a>
    <a href="/visualization" style="margin-top: 35px;">TASK SUMMARY</a>
    <a href="/logout" style="margin-top: 270px;">LOGOUT</a>
</div>

<div class="container">
	<h1>HOME</h1>
  </div>
  
  <div class="container">
	<h5>Completed Tasks</h5>
	<table class="table table-dark table-hover ">
	<tr> <th>Name</th> <th>Start Date</th> <th>End Date</th></tr>
	<?php
		$str = '';
		foreach ($project_tasks as $row)
		{
			if ($row['status'] != 'completed') continue;
		$str .= "<tr>
		<td>".$row['name']."</td>
		<td>".$row['start_date']."</td>
		<td>".$row['end_date']."</td>
		</tr>";
		}
		echo $str;
	?>
	</table>
	</div>
	  
	<div class="container">
	<h5>Current Tasks</h5>
	<table class="table table-dark table-hover ">
	<tr> <th>Name</th> <th>Start Date</th> <th>End Date</th></tr>
	<?php
		$str = '';
		foreach ($project_tasks as $row)
		{
			if ($row['status'] != 'current') continue;
		$str .= "<tr>
		<td>".$row['name']."</td>
		<td>".$row['start_date']."</td>
		<td>".$row['end_date']."</td>
		</tr>";
		}
		echo $str;
	?>
	
	</table>
	</div>
	
	<div class="container">
	<h5>Suspended Tasks</h5>
	<table class="table table-dark table-hover ">
	<tr> <th>Name</th> <th>Start Date</th> <th>End Date</th></tr>
	<?php
		$str = '';
		foreach ($project_tasks as $row)
		{
			if ($row['status'] != 'suspended') continue;
		$str .= "<tr>
		<td>".$row['name']."</td>
		<td>".$row['start_date']."</td>
		<td>".$row['end_date']."</td>
		</tr>";
		}
		echo $str;
	?>
	</table>
</div>

</body>
</html> 