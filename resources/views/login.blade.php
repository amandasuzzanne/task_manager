
<!DOCTYPE html>
<html>
<html>
   <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
         
         body {background-color:#F0EFE7;}
         .container {
            margin-top: 3%;
         }
         button:hover {
            opacity: 0.8;
         }
      </style>
      <title>User Login</title>
   </head>

<body style="margin-left: 500px;">
      <div class="container">
         <h3 style="margin-bottom: 50px; margin-left: 35px;">Task Manager</h3>
         <form action="/login" method="post">
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
	         <button type="submit" class="btn btn-primary col-sm-1.4" style="margin-left: 80px; margin-bottom: 50px;" name="submit">LOGIN</button>
            <div><a href="/add_user" style="color: black; margin-left: 20px;">DON'T HAVE AN ACCOUNT?</a></div>
         </form>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
</body>
</html>