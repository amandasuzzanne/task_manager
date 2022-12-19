<!DOCTYPE html>
<html>
<head>
<title>New Task</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>
body{
    background-color:#F0EFE7;
}

.container{
    margin-top:3%;
}
    
button, a:hover{
    opacity: 0.8;
}

a{
    display: inline-block;
    padding: 8px 16px;
}
</style>
</head>

<body>
    <div class="sidenav">
        <a href="/" style="color: white;">HOME</a>
        <a href="/manage_tasks" style="margin-top: 15px;">MANAGE TASKS</a>
        <a href="/calendar" style="margin-top: 15px;">EVENT CALENDAR</a>
        <a href="/visualization" style="margin-top: 15px;">TASKS SUMMARY</a>
        <a href="/logout" style="margin-top: 150px;">LOGOUT</a>
    </div>
<div class="container">
<h3>Add Task</h3>
<form action="<?php echo '/add_task'; ?>" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="user_id" value="<?php echo request('user_id'); ?>">
<div class="row mb-4">
    <label for="inputName" class="col-sm-2 col-form-label">Task Name:</label>
    <div class="col-sm-3">
    <input type="name" id="inputName" placeholder="Task Name" name="name" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date:</label>
    <div class="col-sm-3">
    <input type="date" id="inputStartDate" placeholder="Start Date" name="start_date" class="form-control" >
    </div>
</div>
<div class="row mb-4">
    <label for="inputEndDate" class="col-sm-2 col-form-label">End Date:</label>
    <div class="col-sm-3">
    <input type="date" id="inputEndDate" placeholder="Date" name="end_date" class="form-control" >
    </div>
</div>
    <a href="/" class="btn btn-secondary col-sm-1">Back</a>
    <button id="save_btn" type="save" class="btn btn-primary col-sm-1" style="margin-left: 260px;" name="save">Save</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html> 