

<?php
    if (isset($_POST["submit"])){
         
        $username = $_POST["uid"];
        $password = $_POST["pwd"];
    

    require_once "db.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($username,$password) === true){
        header("location: ../loginPage.php?error=emptyinput");
        exit();
    }

    else{login_user($conn, $username, $password);}
    
        
    }else{
        header("location: ../loginPage.php");
        exit();
    }

?>