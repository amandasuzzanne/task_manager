<?php
//using database connection file here
include('configuration.blade.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<title>MANAGE TASKS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<h1>MANAGE TASKS</h1>

<div class="sidenav">
    <a href="/home" style="margin-top: 35px;">HOME</a>
    <a href="/manageTasks" style="color: white; margin-top: 35px;">MANAGE TASKS</a>
    <a href="/calendarIndex" style="margin-top: 35px;">EVENT CALENDAR</a>
    <a href="/visualization" style="margin-top: 35px;">TASK SUMMARY</a>
    <a href="/logout" style="margin-top: 270px;">LOGOUT</a>
</div>

<h5>Tasks</h5>

<table class="table table-dark table-hover">
<tr> <th>Name</th> <th>Start Date</th> <th>End Date</th> <th>Status</th><th></th><th></th></tr>

<?php
	$str = '';
	$sql = "SELECT * FROM tasks ORDER BY start_date";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['start_date']."</td>
	<td>".$row['end_date']."</td>
    <td>".$row['status']."</td>
	<td> <a href='editTask.blade.php?id=".$row['id']."' class='btn btn-light btn-sm'>Edit</a> </td>
	<td> <a href='deleteTask.blade.php?id=".$row['id']."' class='btn btn-light btn-sm'>Delete</a> </td>
	</tr>";
	
	}
	
	echo $str;
	
?>
</table>
<a href='addTask.blade.php?' class='btn btn-primary col-sm-1.8' style="margin-left: 930px;">NEW TASK</a>
</div>

</body>
</html>   