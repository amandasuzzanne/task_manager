<!DOCTYPE html>
<html>
<head>
<title>CREATE ACCOUNT</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
   body{background-color:#F0EFE7;}
   .container{
      margin-top:3%;
   }
</style>
</head>
<body style="margin-left: 450px;">

<div>
<div >
  <h1 style="margin-bottom: 50px;">Create Account</h1>
</div>
<div>
</div>
<form action="/add_user" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row mb-4">
   <div class="col-sm-4">
   <input type="username" id="inputUsername" name="username" class="form-control" placeholder="Username">
   </div>
</div>

<div class="row mb-4">
   <div class="col-sm-4">
   <input type="password" id="inputPassword" name="password" style="margin-bottom: 50px;" class="form-control" placeholder="Password" >
   </div>
</div>
	<button type="submit" class="btn btn-primary col-sm-1.4" style="margin-left: 100px;" name="submit">REGISTER</button>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>