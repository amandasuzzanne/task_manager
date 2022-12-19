<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<h3>UPDATE TASK</h3>

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
    background-color: #212529;
}
</style>

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html> 

<form action="/edit_task/{{ request('task_id') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
<div class="row mb-4">
   <label for="inputName" class="col-sm-2 col-form-label">Task:</label>
   <div class="col-sm-3">
   <input type="text" class="form-control"  name="name" value="<?php echo $data['name'] ?>" placeholder="Task">
   </div>
</div>
<div class="row mb-4">
   <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date:</label>
   <div class="col-sm-3">
   <input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date'] ?>" placeholder="Start Date">
   </div>
</div>
<div class="row mb-4">
   <label for="inputEndDate" class="col-sm-2 col-form-label">End Date:</label>
   <div class="col-sm-3">
   <input type="date" class="form-control" name="end_date" value="<?php echo $data['end_date'] ?>" placeholder="End Date">
   </div>
</div>
<div class="row mb-4">
<label for="status" class="col-sm-2 col-form-label">Task Status:</label>
<div class="col-sm-3">
<select name="status" class="form-control" >
    <?php foreach (['current', 'completed', 'suspended'] as $value): ?>
        <option value="<?php echo $value ?>" <?php echo $value == $data['status']? 'selected' : '' ?>>
            <?php echo ucfirst($value) ?>
        </option>
    <?php endforeach; ?>
</select>
</div>

<a href="/manage_tasks" class="btn btn-secondary col-sm-1">Back</a>
<button type="submit" class="btn btn-primary col-sm-1" style="margin-left: 260px;" name="update">Update</button>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
