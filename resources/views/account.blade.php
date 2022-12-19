<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="sidenav">
    <a href="/" style="color: white;">Home</a>
    <a href="/manage_tasks" style="margin-top: 15px;">Create Task</a>
    <a href="/calendar_index" style="margin-top: 15px;">Event Calendar</a>
    <a href="/visualization" style="margin-top: 15px;">Task Visualization</a>
    <a href="/logout" style="margin-top: 150px;">Logout</a>
</div>

<div class="container">

<div class="main">
  <h1>Account</h1>
</div>

<table class="table table-dark table-hover ">
<tr> <th>Name</th> <th>Email</th> <th>Rank</th></tr>

<?php
    $str = "";
	foreach ($users as $row)
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['email']."</td>
	</tr>";
	}
	echo $str;
?>
</table>

<h3>Change Password</h3>
<form action="/account" method="post">

<div class="row mb-4">
   <label for="inputPassword" class="col-sm-2 col-form-label">Current Password:</label>
   <div class="col-sm-3">
   <input type="password" class="form-control" name="currentPassword">
    </div>
</div>
<div class="row mb-4">
   <label for="inputPassword" class="col-sm-2 col-form-label">New Password:</label>
   <div class="col-sm-3">
   <input type="password" class="form-control" name="newPassword">
   </div>
</div>
<div class="row mb-">
   <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
   <div class="col-sm-3">
   <input type="password" class="form-control" name="confirmPassword">
   </div>
</div>
<button id="save_btn" type="save" class="btn btn-primary col-sm-1" style="margin-top: 20px; margin-left: 330px;" name="save">Save</button>
</form>
</div> 

</div>

</body>
</html>