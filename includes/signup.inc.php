<?php
    if (isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $password = $_POST["pwd"];
        $pwdRepeat = $_POST["RepeatPwd"];
        $gsmNo = $_POST["gsm"];
        $job = $_POST["job"];

        require_once "db.inc.php";
        require_once "functions.inc.php";

        if (emptyInputSignUp($name, $email, $username, $password, $pwdRepeat) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if (invalidUid($username) !== false){
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
        if (invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($password, $pwdRepeat) !== false){
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        if (uidExists($conn, $username, $email) !== false){
            header("location: ../signup.php?error=uidexists");
            exit();
        }
        if (uidExists($conn, $username, $email) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        createUser($conn, $name, $email, $username, $password, $gsmNo, $job);

    }else{
        header("location: ../loginPage.php");
    }
?>