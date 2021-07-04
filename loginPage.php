<?php
  include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<div class="container" style="margin-bottom:100px; ">
	   
	   <div class="row">
	  
		<div class="col-lg-12" style="border:1px solid #e1e1e1; padding:20px; text-align: center">

	 <form class="form-signin" method = "post" action = "includes/login.inc.php" style = "text-align: left;">
    <input name="form_1" id="form_1" value="1" type="hidden" />
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="username" class="sr-only">Username</label>
      <input type="text" name = "uid" id="uid"  class="form-control" placeholder="Username" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "pwd" id="pwd" class="form-control" placeholder="Password" required="">  
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block"  name ="submit" id="submit" value = "LOGIN">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form> 

<?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
          echo "<p> Fill in the blanks! <p>";
        }
        if ($_GET["error"] == "wronglogin"){
          echo "<p> Incorrect Login  <p>";
        }
        if ($_GET["error"] == "wrongpassword"){
          echo "<p> Incorrect Password <p>";
        }
      }
        
      ?>

		</div>	 
	
		</div>	
</body>
</html>
