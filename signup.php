
<?php 
  include_once 'header.php';
  
?>
    <div class="container" style="margin-bottom:100px; ">
	   
	   <div class="row">
	  
		<div class="col-lg-12" style="border:1px solid #e1e1e1; padding:20px">

		<form class="form-signin" method = "post" action = "includes/signup.inc.php">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputusername" class="sr-only">Full Name</label>
      <input type="text" name = "name"  class="form-control" placeholder="Username" required="" autofocus="">
      <label for="inputusername" class="sr-only">Email</label>
      <input type="email" name = "email"  class="form-control" placeholder="Username" required="" autofocus="">
      <label for="username" class="sr-only">Username</label>
      <input type="text" name = "uid"  class="form-control" placeholder="Email" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name = "pwd" class="form-control" placeholder="Password" required="">
      <label for="inputPassword" class="sr-only">Repeat Password</label>
      <input type="password" name = "RepeatPwd" class="form-control" placeholder="Password" required="">
      <label for="username" class="sr-only" >Phone Number</label>
      <input type="text" name = "gsm"  class="form-control" placeholder="Phone Number" >
      <label for="inputPassword" class="sr-only"> Job</label>
      <input type="text" name = "job" class="form-control" placeholder="Job" style="margin-bottom: 20px;">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit"value = "LOGIN">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>

		</div>	 
		
		</div>
    <?php
      if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
          echo "<p> Fill in the blanks! <p>";
        }
        if ($_GET["error"] == "invaliduid"){
          echo "<p> Choose a proper username! <p>";
        }
        if($_GET["error"] == "invalidemail"){
          echo "<p> Write a proper email! <p>";
        }
        if ($_GET["error"] == "passwordsdontmatch"){
          echo "<p> Passwords don't match. <p>";
        }
        if ($_GET["error"] == "stmtfailed"){
          echo "<p> Something went wrong, try again.<p>";
        }
        else if ($_GET["error"] == "none"){
          echo "<p> You have succesfully signed up";
          header("location: /loginPage.php");
        }
      }


    ?>	
        <!-- /END THE FEATURETTES -->
<?php 
  include_once 'footer.php';
?>